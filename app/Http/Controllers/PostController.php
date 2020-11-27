<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostForm;
use Illuminate\Support\Facades\Auth;
use App\Services\CheckSearch;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Check;
use App\Models\Post;
use App\Models\Resident;
use App\Models\Unit;
use App\Models\User;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 検索のためのoptionを取得。
        $users = User::option();
        $residents = Resident::option();
        $units = Unit::option();

        $posts = Post::with('user', 'resident', 'unit')
            ->latest()
            ->simplePaginate(5);

        return view('post.index', compact('posts', 'users', 'residents', 'units'));

    }

    public function search(Request $request)
    {
        $users = User::option();
        $residents = Resident::option();
        $units = Unit::option();

        // 検索formのデータをチェック Servicesに処理を切り分けた。
        $posts = CheckSearch::checkData($request);

        if(empty($posts)){
            return redirect()->back()->with('flash_message', '最低でも、一つは選択してください。');
        }

        return view('post.index', compact('users', 'residents', 'units', 'posts'));

    }

    public function show($id)
    {
        $post = Post::find($id);
        $user_id = Auth::id();

         // 自分が申し送りを確認しているのか
        $checked = Check::checked($id, $user_id);
        // 誰が申し送りを確認しているのか。
        $checkedMembers = Check::member($id);

        return view('post.show', compact('post', 'checkedMembers', 'checked'));

    }

    public function create()
    {
        // select options
        $residents = Resident::option();
        $units = Unit::option();

        // 投稿者
        $user = Auth::user();

        return view('post.create', compact('residents', 'units', 'user'));
    }

    public function store(StorePostForm $request, Post $post)
    {
        // マスアサインメントを使い、storeをより簡潔に。
        $post->create($request->validated());

        return redirect(route('post.index'))->with('store', '新しく申し送りを投稿しました。');
    }

    public function edit($id, Post $post)
    {
        // select options
        $units = Unit::option();
        $residents = Resident::option();
        
        $post = Post::with('resident', 'unit')->find($id);

        // 申し送りを編集する認可をcheck
        if(Gate::allows('postControl', $post)){

            return view('post.edit', compact('post', 'residents', 'units'));

        }else {

            return redirect()->back()->with('message', '自分が投稿した申し送りのみ、編集できます。');
        }
    }

    public function update($id, StorePostForm $request)
    {
        $post = Post::find($id);

        $post->update($request->validated());

        return redirect(route('post.index'))->with('update', '申し送りを変更しました。');
    }

    public function delete($id, Request $request)
    {

        $delete_post = Post::with('user')->find($id);

        // 申し送りを削除する認可をcheck
        if(Gate::allows('postControl', $delete_post)){
            return view('post.delete', compact('delete_post'));
        }else {
            return redirect()->back()->with('delete','自分が投稿した申し送りのみ、削除できます。');
        }
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('post.index'))->with('delete', '申し送りを削除しました。');
    }

}
