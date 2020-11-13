<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Check;
use App\Models\User;
use App\Models\Resident;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostForm;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

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

        $posts = Post::orderBy('created_at', 'desc')
        ->with(['user', 'resident'])
        ->simplePaginate(5);
        
        foreach($posts as $post)
        {
            $contents = $post->content;
        }
        $content = Str::limit($contents, 30);

        return view('post.index', compact('posts', 'users', 'residents','content'));
        
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

        foreach($posts as $post)
        {
            $contents = $post->content;
        }
        $content = Str::limit($contents, 30);
        

        return view('post.index', compact('users', 'posts', 'residents','content'));
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
        $units = Unit::all();
        $residents = Resident::all();

        $post = Post::with(['resident', 'unit'])->findOrFail($id);
                
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
