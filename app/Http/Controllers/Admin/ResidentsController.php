<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\Unit;
use App\Models\Adl;

class ResidentsController extends Controller
{
    public function index(Request $request)
    {
        $selectOptions = Resident::option();

        $string = $request->resident_name;
        
        if($string != ''){
            $residents = Resident::where('resident_name', 'like','%'.$string.'%')
                                    ->simplePaginate(5);
        }else{
            $residents = Resident::orderBy('created_at', 'desc')
                        ->simplePaginate(5);
        }

        return view('admin.residents.index', compact('selectOptions', 'residents'));
        
    }

    public function create()
    {
        $units = Unit::option();
        return view('admin.residents.create', compact('units'));
    }

    public function store(Request $request)
    {   
        $resident = new Resident;

        $resident->resident_name = $request->input('resident_name');
        $resident->age = $request->age;
        $resident->gender = $request->gender;
        $resident->assistance = $request->assistance;
        $resident->info = $request->info;
        $resident->unit_id = $request->unit_id;

        $resident->save();

        return redirect('admin/residents');
    }

    public function show($id)
    {
        $resident = Resident::findOrFail($id);
        $adl = Adl::where('resident_id', $id)
                ->with('resident')
                ->get();
        //dd($adl);
        return view('admin.residents.show_adl', compact('adl', 'resident'));
    }

    public function edit($id)
    {
        $adls = Adl::where('resident_id', $id)
                ->with('resident')
                ->get();
        return view('admin.residents.edit', compact('adls'));
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
