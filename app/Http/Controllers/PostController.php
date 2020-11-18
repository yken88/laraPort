<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostForm;
use App\Models\Check;
use App\Models\Post;
use App\Models\Resident;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\CheckSearch;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // selectbox のoption, 各名前とidのみ取り出すため、ModelのローカルスコープscopeOption()を適用。
        $users = User::option();
        $residents = Resident::option();
        $units = Unit::option();

        $posts = Post::orderBy('created_at', 'desc')
            ->with(['user', 'resident', 'unit'])
            ->simplePaginate(5);

        return view('post.index', compact('posts', 'users', 'residents', 'units'));

    }

    public function search(Request $request)
    {
        $users = User::option();
        $residents = Resident::option();
        $units = Unit::option();

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

        $checkedMembers = Check::member($id);

        $checked = Check::checked($id, $user_id);

        return view('post.show', compact('post', 'checkedMembers', 'checked'));

    }

    public function create()
    {
        $residents = Resident::option();
        $units = Unit::option();

        $user = Auth::user();

        return view('post.create', compact('residents', 'units', 'user'));
    }

    public function store(StorePostForm $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->resident_id = $request->resident_id;
        $post->unit_id = $request->unit_id;
        $post->save();

        return redirect('/post');
    }

    public function edit($id, Request $request, Post $post)
    {
        $units = Unit::option();
        $residents = Resident::option();

        $post = Post::with(['resident', 'unit'])->findOrFail($id);

        $this->authorize('destroy', $post);

        return view('post.edit', compact('post', 'residents', 'units'));
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);

        $post->resident_id = $request->resident_id;
        $post->unit_id = $request->unit_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->update();

        return redirect('/post');
    }

    public function delete($id, Request $request, Post $post)
    {

        $delete_post = Post::with('user')->find($id);

        $this->authorize('destroy', $delete_post);
        return view('post.delete', compact('delete_post'));
    }

    public function destroy(Request $request, Post $post)
    {
        $this->authorize('destroy', $post);

        $post->delete();

        return redirect('/post');
    }

    // 確認管理
    public function check($id)
    {
        $check = new Check;

        $check->user_id = Auth::id();
        $check->post_id = $id;
        $check->save();

        return redirect()->back();
    }

}
