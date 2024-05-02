<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Medicine;

class MedicineController extends Controller
{
    //all
    public function index()
    {
        return response([
            'data' => Medicine::orderBy('name', 'asc')->orderBy('expiry_date', 'asc')->get()
        ], 200);
    }
}
