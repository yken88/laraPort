<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Unit;


class UserController extends Controller
{
    public function construct()
    {
        $this->middleware('admin');
    }
    
    //ユーザ一覧
    public function index()
    {
        $users = User::orderBy('id', 'asc')
                    ->with('unit')        
                    ->simplePaginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $units = Unit::option();
        return view('admin.user.create', compact('units'));
    }

    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->unit_id = $request->unit_id;
        $user->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }
}

