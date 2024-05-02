<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    //by user login
    public function showByUserLogin()
    {
        return response([
            'data' => Attendance::where('user_id', Auth::id())->get()
        ], 200);
    }

    //today by user login
    public function todayUserLogin()
    {
        $attendances = Attendance::where('user_id', Auth::user()->id)
            ->whereDate('date', Carbon::today())
            ->get();

        $attendances2 = Attendance::where('user_id', Auth::user()->id)
            ->whereDate('date', Carbon::today())
            ->whereNotNull('check_out')
            ->get();

        // Memeriksa apakah hasil kueri kosong
        if ($attendances->isEmpty()) {
            return response(['status' => 'Kosong'], 200);
        } else {
            return response(['status' => 'Ada', 'data' => $attendances], 200);
        }
    }

    //by user login dan month
    public function byUserLoginMonthly($date)
    {
        list($year, $month) = explode('-', $date);

        return response([
            'data' => Attendance::where('user_id', Auth::user()->id)
                ->whereYear('date', $year)
                ->whereMonth('date', $month)->get()
        ], 200);
    }

    //create
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'date' => 'required|string',
            'check_in' => 'required|string',
        ]);


        $attendance = Attendance::create([
            'user_id' => Auth::id(),
            'date' => $attrs['date'],
            'check_in' => $attrs['check_in'],
        ]);

        return response([
            'message' => 'Attendance created.',
            'data' => $attendance
        ], 200);
    }

    // update
    public function update(Request $request, $id)
    {
        $attendance = Attendance::find($id);

        if (!$attendance) {
            return response([
                'message' => 'Post not found.'
            ], 403);
        }

        //validate fields
        $attrs = $request->validate([
            'check_out' => 'required|string',
        ]);
        $attendance->update([
            'check_out' => $attrs['check_out'],
        ]);

        return response([
            'message' => 'Post updated.',
            'data' => $attendance
        ], 200);
    }
}
