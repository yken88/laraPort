<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Adl;
use App\Http\Requests\StoreAdlForm;

class AdlController extends Controller
{
    //adlの編集
    public function edit($id)
    {
        $adl = Adl::find($id);

        return view('admin.residents.edit_adl', compact('adl'));
    }


    public function update($id, Request $request)
    {
        $adl = Adl::find($id);
        
        $adl->update($request->all());

        return redirect(route('admin.residents.index'))->with('adl_update', 'adlを更新しました。');
    }
}
