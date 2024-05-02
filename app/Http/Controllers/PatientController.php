<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::where('role', 'pasien')->orderBy('name', 'asc');
        if (request('pemilik')) {
            $patients->where('name', 'like', '%' . request('pemilik') . '%');
        }
        return view('pemilik.index', [
            "title" => "Data Pemilik",
            "active" => "pemilik",
            'patients' => $patients->simplePaginate(10),
        ]);
    }
}
