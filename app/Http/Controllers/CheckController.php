<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Check;


class CheckController extends Controller
{
    // 確認管理
    public function check($id)
    {
        $check = new Check;

        $check->user_id = Auth::id();
        $check->post_id = $id;
        $check->save();

        return redirect(route('post.index'))->with('checked', 'あなたは申し送りを確認しました。');
    }

    public function unCheck($id)
    {
        $check = Check::where('post_id', $id)->where('user_id', Auth::id());
        $check->delete();

        return redirect()->back();
    }
}
