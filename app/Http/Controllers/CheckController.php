<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Check;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CheckController extends Controller
{
    public function show($id)
    {   
        $user_id = Auth::id();

        $checkedMember = Check::where('user_id', $user_id)->where('post_id', $id)->get();

        return view('post.show', compact('checkedMember'));
        

    }

    public function store($id)
    {
        $check = new Check;
        $user_id = Auth::id();

        $check->user_id = $user_id;
        $check->post_id = $id;
        $check->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $check = Check::where('post_id', $id)->where('user_id', Auth::id());
        $check->delete();

        return redirect()->back();
    }
}
