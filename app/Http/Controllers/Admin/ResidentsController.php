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
        
        return view('admin.residents.show_adl', compact('adl', 'resident'));
    }

    public function edit($id)
    {
       $resident = Resident::findOrFail($id);

       $unitSelectOptions = Unit::option();

       return view('admin.residents.edit', compact('resident','unitSelectOptions'));
    }

    public function update(Request $request)
    {
        
    }
}
