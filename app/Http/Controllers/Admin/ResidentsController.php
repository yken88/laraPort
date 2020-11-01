<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\Unit;
use App\Models\Adl;

class ResidentsController extends Controller
{
    public function index()
    {
        $residents = Resident::all();

        return view('admin.residents.index')->with('residents', $residents);
    }

    public function show($id)
    {
        $adl = Adl::where('resident_id', $id)
                ->with('resident')
                ->get();
        //dd($adl);
        return view('admin.residents.show_adl', compact('adl'));
    }

    public function edit($id)
    {
        $adl = Adl::where('resident_id', $id)
                ->with('resident')
                ->get();

        return view('admin.residents.edit', compact('adl'));
    }

    public function update(Request $request)
    {
        $adl = new Adl;
        
        $adl->移乗 = $request->移乗;
        $adl->トイレ動作 = $request->トイレ動作;
        $adl->平地歩行 = $request->平地歩行;
        $adl->食事 = $request->食事;
        $adl->排泄 = $request->排泄;
        $adl->入浴 = $request->入浴;
        $adl->更衣 = $request->更衣;
        $adl->備考 = $request->備考;
        $adl->save();

        return redirect()->back();
    }
}
