<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreResidentForm;
use App\Services\SearchUser;
use App\Models\Resident;
use App\Models\Unit;
use App\Models\Adl;

class ResidentController extends Controller
{
    public function index(Request $request)
    {
        $selectOptions = Resident::option();

        $string = $request->resident_name;
        
        $residents = SearchUser::CheckResidentString($string);

        return view('admin.residents.index', compact('selectOptions', 'residents'));
        
    }

    public function create()
    {
        $units = Unit::option();
        return view('admin.residents.create', compact('units'));
    }

    public function store(Resident $resident, StoreResidentForm $request)
    {   
        $resident->create($request->validated());

        return redirect(route('admin.residents.index'));
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

    public function update($id, Request $request)
    {
        $resident = Resident::find($id);

        $resident->update($request->all());

        return redirect(route('admin.residents.index'))
                ->with('update_a_resident', 'ユーザ情報を更新しました。');
    }
}
