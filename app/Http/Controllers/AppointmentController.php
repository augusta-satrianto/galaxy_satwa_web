<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pet;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Notification;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('jadwal.index', [
            "title" => "Data Hewan",
            "active" => "hewan",
            "hariini" =>  Appointment::where('status', 'dibuat')->whereDate('date', Carbon::today())->orderBy('date', 'asc')->get(),
            "mendatang" => Appointment::where('status', 'dibuat')->whereDate('date', '>', Carbon::today())->orderBy('date', 'asc')->get(),
            "selesai" => Appointment::where('status', 'dibuat')->whereDate('date', '<', Carbon::today())->orderBy('date', 'asc')->get(),
            "dibatalkan" => Appointment::where('status', 'dibatalkan')->orderBy('date', 'asc')->get(),
            "hariini2" => Schedule::where('status', 'dibuat')->whereDate('date', Carbon::today())->orderBy('date', 'asc')->get(),
            "mendatang2" => Schedule::where('status', 'dibuat')->whereDate('date', '>', Carbon::today())->orderBy('date', 'asc')->get(),
            "selesai2" => Schedule::where('status', 'dibuat')->whereDate('date', '<', Carbon::today())->orderBy('date', 'asc')->get(),
            "dibatalkan2" => Schedule::where('status', 'dibatalkan')->orderBy('date', 'asc')->get(),

        ]);
    }


    public function create()
    {
        return view('jadwal.create', [
            'doctors' => User::where('role', 'dokter')->get(),
            'patients' => User::where('role', 'pasien')->orderBy('name', 'asc')->get(),
            'pets' => Pet::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|max:255',
            'doctor_id' => 'required|max:255',
            'hewan' => 'required|max:255',
            'date' => 'required',
            'time' => 'required',
        ]);

        $date = Carbon::createFromFormat('d/m/Y', $validatedData['date'])->format('Y-m-d');
        $validatedData['date'] = $date;
        $validatedData['pet_id'] = intval($validatedData['hewan']);
        Appointment::create($validatedData);

        // Notif Dokter
        $validatedNotifD['user_id'] = $validatedData['doctor_id'];
        $validatedNotifD['title'] = "Pemberitahuan";
        $validatedNotifD['description'] = 'Ada jadwal janji temu pada ' . $validatedData['date'] . $validatedData['time'];
        Notification::create($validatedNotifD);

        // Notif Pasien
        $validatedNotifP['user_id'] = $validatedData['patient_id'];
        $validatedNotifP['title'] = "Pemberitahuan";
        $validatedNotifP['description'] = 'Ada jadwal janji temu pada ' . $validatedData['date'] . $validatedData['time'];
        Notification::create($validatedNotifP);

        return redirect('/jadwal')->with('success', 'Berhasil membuat janji temu');
    }


    public function update(Request $request, Appointment $appointment)
    {
        $validatedData['status'] = 'dibatalkan';

        Appointment::where('id', $appointment->id)->update($validatedData);

        // Notif Dokter
        $validatedNotifD['user_id'] = $appointment->doctor_id;
        $validatedNotifD['title'] = "Pemberitahuan";
        $validatedNotifD['description'] = 'Jadwal janji temu pada ' . $validatedData['date'] . $validatedData['time'] . ' dibatalkan';
        Notification::create($validatedNotifD);

        // Notif Pasien
        $validatedNotifP['user_id'] = $appointment->patient_id;
        $validatedNotifP['title'] = "Pemberitahuan";
        $validatedNotifP['description'] = 'Jadwal janji temu pada ' . $validatedData['date'] . $validatedData['time'] . 'dibatalkan karena dokter memiliki kepentingan mendesak';
        Notification::create($validatedNotifP);
        return redirect('/jadwal')->with('success', 'Berhasil membatalkan janji temu');
    }
}
