<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //ユーザ一覧
    public function index(Request $request)
    { 
        $selectOptions = User::option();

        $string = $request->name;

        if($string != ''){
            $users = User::where('name', 'like','%'.$string.'%')
                            ->simplePaginate(5);
        }else{
            $users = User::orderBy('id', 'asc')
                    ->with('unit')        
                    ->simplePaginate(5);
        }
        
        return view('admin.user.index', compact('users', 'selectOptions'));
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
        $units = Unit::option();
        $user = User::find($id);
        return view('admin.user.edit', compact('user', 'units'));
    }

    public function update(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password;
        $user->update();

        return redirect('admin/user');
    }

    public function delete($id)
    {
        $user = User::find($id);
        
        return view('admin.user.delete', compact('user'));
    }
    public function destroy($id)
    {
        $user = User::findOrfail($id);   
        $user->delete();

        return redirect('admin/user')->with('message','ユーザを削除しました。');
    }

}

