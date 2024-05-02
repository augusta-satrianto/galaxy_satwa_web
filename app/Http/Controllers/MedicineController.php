<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Medicine;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::orderBy('name', 'asc');
        if (request('obat')) {
            $medicines->where('name', 'like', '%' . request('obat') . '%');
        }
        return view('obat.index', [
            "title" => "Data Hewan",
            "active" => "hewan",
            "medicines" => $medicines->simplePaginate(10),
        ]);
    }

    public function create()
    {
        return view('obat.create', []);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'name' => 'required|max:255',
            'stock' => 'required|max:255',
            'expiry_date' => 'required',
        ]);

        $expiry_date = Carbon::createFromFormat('d/m/Y', $validatedData['expiry_date'])->format('Y-m-d');
        $validatedData['expiry_date'] = $expiry_date;

        Medicine::create($validatedData);
        return redirect('/obat')->with('success', 'Berhasil menambahkan data obat');
    }

    public function edit(Medicine $medicine)
    {
        return view('obat.edit', [
            'medicine' => $medicine,
        ]);
    }


    public function update(Request $request, Medicine $medicine)
    {
        $rules = [
            'code' => 'required|max:255',
            'name' => 'required|max:255',
            'stock' => 'required|max:255',
            'expiry_date' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $expiry_date = Carbon::createFromFormat('d/m/Y', $validatedData['expiry_date'])->format('Y-m-d');
        $validatedData['expiry_date'] = $expiry_date;

        Medicine::where('id', $medicine->id)->update($validatedData);
        return redirect('/obat')->with('success', 'Data obat berhasil diperbarui');
    }

    public function destroy(Medicine $medicine)
    {
        Medicine::destroy($medicine->id);
        return redirect('/obat')->with('success', 'Data obat berhasil dihapus');
    }
}
