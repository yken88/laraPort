<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\SearchUser;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserForm;
use App\Models\User;
use App\Models\Admin;
use App\Models\Unit;

class UserController extends Controller
{
    //ユーザ一覧
    public function index(Request $request)
    { 
        $string = $request->name;

        // Services/SearchUser 呼び出し。
        $users = SearchUser::CheckString($string);
        
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $units = Unit::option();
        return view('admin.user.create', compact('units'));
    }

    public function store(User $user, StoreUserForm $request)
    {
        // 登録機能を簡潔に。
        $user->create($request->validated());

        return redirect(route('admin.user.index'))->with('create_a_user', 'ユーザを登録しました。');
    }

    public function edit($id)
    {
        $units = Unit::option();
        $user = User::find($id);
        return view('admin.user.edit', compact('user', 'units'));
    }

    public function update($id, StoreUserForm $request)
    {
        $user = User::find($id);


        $user->update($request->validated());

    }

    public function delete($id)
    {
        $user = User::find($id);
        
        // 削除確認画面へ
        return view('admin.user.delete', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('admin.user.index'))->with('delete_a_user','ユーザを削除しました。');
    }

}

