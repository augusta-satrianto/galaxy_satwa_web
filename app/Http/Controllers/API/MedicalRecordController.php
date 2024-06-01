<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    //by pet id
    public function show($id)
    {
        return response([
            'data' => MedicalRecord::where('pet_id', $id)->with(['pet', 'doctor'])->orderBy('date', 'desc')->orderBy('created_at', 'desc')->get()
        ], 200);
    }

    //create
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'pet_id' => 'required',
            'symptom' => 'required|string',
            'diagnosis' => 'required|string',
            'action' => 'required|string',
            'recipe' => 'required|string',
        ]);
        $medicalrecord = MedicalRecord::create([
            'doctor_id' => Auth::id(),
            'pet_id' => $attrs['pet_id'],
            'date' => date('Y/m/d'),
            'symptom' => $attrs['symptom'],
            'diagnosis' => $attrs['diagnosis'],
            'action' => $attrs['action'],
            'recipe' => $attrs['recipe'],
        ]);

        return response([
            'message' => 'post created.',
            'data' => $medicalrecord
        ], 200);
    }


    // update
    public function update(Request $request, $id)
    {
        $record = MedicalRecord::find($id);
        //validate fields
        $attrs = $request->validate([
            'symptom' => 'required|string',
            'diagnosis' => 'required|string',
            'action' => 'required|string',
            'recipe' => 'required|string',
        ]);

        $record->update([
            'symptom' => $attrs['symptom'],
            'diagnosis' => $attrs['diagnosis'],
            'action' => $attrs['action'],
            'recipe' => $attrs['recipe'],
        ]);

        return response([
            'message' => 'Post updated.',
            'data' => $record
        ], 200);
    }

    //delete
    public function destroy($id)
    {
        $record = MedicalRecord::find($id);

        if (!$record) {
            return response([
                'message' => 'Post not found.'
            ], 403);
        }
        $record->delete();

        return response([
            'message' => 'Record deleted.'
        ], 200);
    }
}
