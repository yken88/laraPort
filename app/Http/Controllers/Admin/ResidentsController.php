<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\Unit;

class ResidentsController extends Controller
{
    public function index()
    {
        $residents = Resident::all();

        return view('admin.residents.index')->with('residents', $residents);
    }
}
