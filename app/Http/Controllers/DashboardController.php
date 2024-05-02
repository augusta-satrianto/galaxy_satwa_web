<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('index', [
            "title" => "Dashboard",
            "active" => "dashboard",
            "pets" => Pet::orderBy('name', 'asc')->take(5)->get(),
            'patients' => User::where('role', 'pasien')->orderBy('name', 'asc')->take(5)->get(),
            'doctors' => User::where('role', 'dokter')->orderBy('name', 'asc')->take(5)->get(),
            "pets_count" => Pet::orderBy('name', 'asc')->count(),
            'employees_count' => User::where('role', '!=', 'pasien')->orderBy('name', 'asc')->count(),
            "appointments" => Appointment::all(),
            "records_count" => MedicalRecord::count(),
        ]);
    }

    public function verifikasi()
    {
        return view('verifikasi', []);
    }
}
