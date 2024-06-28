<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //all
    public function index()
    {
        return response([
            'data' => Appointment::orderBy('date', 'desc')->get()
        ], 200);
    }

    //by user login
    public function showByUserLogin()
    {
        return response([
            'data' => Appointment::where('patient_id', Auth::id())->orWhere('doctor_id', Auth::id())->with(['patient', 'doctor', 'pet'])->orderBy('date', 'asc')->get()
        ], 200);
    }

    //by doctor and date
    public function byDoctorDate($doctor, $date)
    {
        return response([
            'data' => Appointment::where('doctor_id', $doctor)->where('date', $date)->where('status', 'dibuat')->get()
        ], 200);
    }

    public function willcome()
    {
        return response([
            'data' => Appointment::where(function ($query) {
                $query->where('patient_id', Auth::id())
                    ->orWhere('doctor_id', Auth::id());
            })
                ->where('status', 'dibuat')
                ->whereDate('date', '>=', Carbon::today())
                ->with(['patient', 'doctor', 'pet'])
                ->orderBy('date', 'asc')
                ->get()
        ], 200);
    }



    //create
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'doctor_id' => 'required',
            'pet_id' => 'required',
            'date' => 'required|string',
            'time' => 'required',
        ]);

        $appointment = Appointment::create([
            'patient_id' => Auth::id(),
            'doctor_id' => $attrs['doctor_id'],
            'pet_id' => $attrs['pet_id'],
            'date' => $attrs['date'],
            'time' => $attrs['time'],
        ]);

        return response([
            'message' => 'appointment created.',
            'data' => $appointment
        ], 200);
    }

    // update status
    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response([
                'message' => 'Appointment not found.'
            ], 403);
        }

        //validate fields
        $attrs = $request->validate([
            'status' => 'required|string',
        ]);

        $appointment->update([
            'status' => $attrs['status'],
        ]);

        return response([
            'message' => 'Appointment updated.',
            'data' => $appointment
        ], 200);
    }
}
