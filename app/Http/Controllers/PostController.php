<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Check;
use App\Models\User;
use App\Models\Resident;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostForm;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //selectBoxのための$users
        $users = User::all();

        //selectBoxのための$resident
        $residents = Resident::all();

        $posts = Post::orderBy('created_at', 'asc')
        ->with(['user', 'resident'])
        ->simplePaginate(5);
        
        
        return view('post.index', compact('posts', 'users', 'residents'));
        
    }

    public function search(Request $request)
    {
        $users = User::all();
        $residents = Resident::all();

        $userId = $request->user_id;
        $residentId = $request->resident_id;

        if($userId && !$residentId){
            $posts = Post::where('user_id', $userId)
                        ->simplePaginate(5);
        }
        

        if(!$userId && $residentId){
            $posts = Post::where('resident_id', $residentId)
                        ->simplePaginate(5);
        }

        if($userId && $residentId){
            $posts = Post::where('user_id', $userId)
                        ->where('resident_id', $userId)
                        ->simplePaginate(5);
        }
        

        return view('post.index', compact('users', 'posts', 'residents'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        $user_id = Auth::id();
        
        $checkedMembers = Check::orderBy('created_at', 'desc')
                        ->where('post_id', $id)
                        ->with('user')
                        ->get();

        $checked = DB::table('checks')
                    ->where('user_id', $user_id)
                    ->where('post_id', $id)
                    ->exists();

        return view('post.show', compact('post', 'checkedMembers', 'checked'));
        
    }

    public function create()
    {
        $residents = Resident::all();
    
        $user = Auth::user();

        return view('post.create', compact('user', 'residents'));
    }

    public function store(StorePostForm $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->resident_id = $request->resident_id;
        $post->unit_id = 1;
        $post->save();

        return redirect('/post');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('post.edit', compact('post'));
    }

    public function update(Request $request)
    {
        $post = new Post;
        $id = Auth::id();

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $id;
        $post->save();

        return redirect()->back();
    }

     public function delete($id, Request $request, Post $post)
        {

            $delete_post = Post::with('user')->find($id);

            
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
        $user_id = Auth::id();

        $check->user_id = $user_id;
        $check->post_id = $id;
        $check->save();

        return redirect()->back();
    }

}
