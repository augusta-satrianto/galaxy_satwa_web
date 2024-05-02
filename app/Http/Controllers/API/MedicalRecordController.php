<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;

class MedicalRecordController extends Controller
{
    //by pet id
    public function show($id)
    {
        return response([
            'data' => MedicalRecord::where('pet_id', $id)->with(['pet', 'doctor'])->get()
        ], 200);
    }
}
