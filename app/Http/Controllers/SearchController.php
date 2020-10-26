<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use DB;

class SearchController extends Controller
{
//     public function search(Request $request)
//     {
//         $id = $request->user_id;
//         $posts = Post::where('user_id', $id)->with('user')->get();

//         return view('search.index', compact('posts'));
//     }

}
