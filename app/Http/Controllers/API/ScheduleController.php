<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    //all
    public function index()
    {
        return response([
            'data' => Schedule::where('status', 'dibuat')->whereDate('date', '>=', Carbon::today())->orderBy('date', 'asc')->get(),
        ], 200);
    }
}
