<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Adl;
use App\Http\Requests\StoreAdlForm;

class AdlController extends Controller
{
    //adlの編集を担う
    public function editAdl($id)
    {
        $adls = Adl::where('resident_id', $id)
            ->with('resident')
            ->get();

        return view('admin.residents.edit_adl', compact('adls'));
    }

    public function updateAdl(StoreAdlForm $request)
    {
        $adl = new Adl;

        $adl->resident_id = $adl->resident_id;
        $adl->移乗 = $request->移乗;
        $adl->トイレ動作 = $request->トイレ動作;
        $adl->平地歩行 = $request->平地歩行;
        $adl->食事 = $request->食事;
        $adl->排泄 = $request->排泄;
        $adl->入浴 = $request->入浴;
        $adl->更衣 = $request->更衣;
        $adl->備考 = $request->備考;
        $adl->update();

        return redirect('admin/residents')->with('update', '更新しました。');
    }
}
