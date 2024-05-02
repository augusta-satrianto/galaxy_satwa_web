<?php

namespace App\Http\Controllers;

use App\Models\Correspondence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LetterController extends Controller
{
    public function index()
    {
        return view('persuratan.index', [
            "title" => "hewan",
            "active" => "hewan",
            "correspondences" => Correspondence::where('reply_file', null)->simplePaginate(10),
            "histories" => Correspondence::where('reply_file', '!=', null)->simplePaginate(10),
        ]);
    }
    public function create()
    {
        return view('persuratan.create', [
            'patients' => User::where('role', 'pasien')->orderBy('name', 'asc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|max:255',
            'category' => 'required|max:255',
            'file' => 'required|file|mimes:pdf|max:5024',
        ]);


        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('correspondence', 'public');
        }

        $validatedData['file'] = 'http://192.168.194.214:8000/storage/' . $validatedData['file'];
        $validatedData['doctor_id'] = Auth::user()->id;


        Correspondence::create($validatedData);

        return redirect('/persuratan')->with('success', 'Surat berhasil dikirim');
    }
}
