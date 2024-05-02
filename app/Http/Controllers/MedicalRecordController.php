<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $pets = Pet::orderBy('name', 'asc');
        if (request('hewan')) {
            $pets->where('name', 'like', '%' . request('hewan') . '%');
        }

        return view('rekammedis.index', [
            "title" => "Rekam Medis",
            "active" => "rekammedis",
            "pets" => $pets->simplePaginate(10),
        ]);
    }


    public function show(Pet $pet)
    {
        return view('rekammedis.read', [
            "title" => "Rekam Medis",
            "active" => "rekammedis",
            "pet" => $pet,
            "records" => MedicalRecord::where('pet_id', $pet->id)->orderBy('date', 'desc')->get(),
        ]);
    }

    public function create(Pet $pet)
    {
        return view('rekammedis.create', [
            "pet" => $pet
        ]);
    }


    public function store(Request $request, Pet $pet)
    {
        $validatedData = $request->validate([
            'symptom' => 'required|max:255',
            'diagnosis' => 'required|max:255',
            'action' => 'required|max:255',
            'recipe' => 'required|max:255',
        ]);

        $validatedData['doctor_id'] = Auth::user()->id;
        $validatedData['pet_id'] = $pet->id;
        $validatedData['date'] = date('Y/m/d');

        MedicalRecord::create($validatedData);
        return redirect('/rekammedis/' . $pet->id)->with('success', 'Berhasil menambahkan data rekam medis');
    }

    public function edit(MedicalRecord $record)
    {
        return view('rekammedis.edit', [
            'record' => $record,
        ]);
    }


    public function update(Request $request, $petId, $recordId)
    {
        $rules = [
            'symptom' => 'required|max:255',
            'diagnosis' => 'required|max:255',
            'action' => 'required|max:255',
            'recipe' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);
        MedicalRecord::where('id', $recordId)->update($validatedData);
        return redirect('/rekammedis/' . $petId)->with('success', 'Data rekam medis berhasil diperbarui');
    }

    public function destroy($petId, $recordId)
    {
        MedicalRecord::destroy($recordId);
        return redirect('/rekammedis/' . $petId)->with('success', 'Data rekam medis berhasil dihapus');
    }
}
