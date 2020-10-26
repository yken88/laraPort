<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Check;
use App\Models\User;
use App\Models\Resident;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
        //textareaのための$users
        $users = User::all();

        $residents = Resident::all();
        $posts = Post::orderBy('user_id', 'asc')
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
            $posts = Post::where('user_id', $userId)->get();
        }
        

        if(!$userId && $residentId){
            $posts = Post::where('resident_id', $residentId)->get();
        }

        if($userId && $residentId){
            $posts = Post::where('user_id', $userId)
                    ->where('resident_id', $userId)
                    ->get();
        }
        

        return view('post.index', compact('users', 'posts', 'residents'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        $user_id = Auth::id();

        $checkedMember = Check::where('user_id', $user_id)
                        ->where('post_id', $id)
                        ->get();

        //dd($checkedMember);

        return view('post.show', compact('post', 'checkedMember'));
        
    }

    public function create()
    {
        $user = Auth::user();

        return view('post.create', compact('user'));
    }

    public function store(Request $request)
    {
        $post = new Post;

        $id = Auth::user()->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $id;
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

        return redirect('/post');
    }

    public function delete($id)
    {
        $user = Post::find($id);
        $user->delete();

        return redirect('/post');
    }
}
