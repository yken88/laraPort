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
}
