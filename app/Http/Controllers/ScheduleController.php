<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function storevaksin(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
        ]);

        $date = Carbon::createFromFormat('d/m/Y', $validatedData['date'])->format('Y-m-d');
        $validatedData['date'] = $date;
        $validatedData['category'] = 'Vaksinasi';

        Schedule::create($validatedData);
        return redirect('/jadwal')->with('success', 'Berhasil membuat jadwal vaksinasi');
    }

    public function storeimun(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
        ]);

        $date = Carbon::createFromFormat('d/m/Y', $validatedData['date'])->format('Y-m-d');
        $validatedData['date'] = $date;
        $validatedData['category'] = 'Imunisasi';

        Schedule::create($validatedData);
        return redirect('/jadwal')->with('success', 'Berhasil membuat jadwal imunisasi');
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validatedData['status'] = 'dibatalkan';

        Schedule::where('id', $schedule->id)->update($validatedData);
        return redirect('/jadwal')->with('success', 'Berhasil membatalkan jadwal');
    }
}
