<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pet;
use App\Models\User;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CorrespondenceController extends Controller
{


    public function view_pdf()
    {
        return view('persuratan.coba');
    }

    public function generate_pdf()
    {
        $order = Pet::all();
        $data = ['order' => $order];
        $pdf = Pdf::loadView('persuratan.coba', $data);
        return $pdf->download('invoice.pdf');
    }

    public function data_obat()
    {
        $medicines = Medicine::all();
        $data = ['medicines' => $medicines];
        $pdf = Pdf::loadView('obat.doc', $data);
        return $pdf->download('data_obat.pdf');
    }

    public function data_hewan()
    {
        $pets = Pet::all();
        $data = ['pets' => $pets];
        $pdf = Pdf::loadView('hewan.doc', $data);
        return $pdf->download('data_hewan.pdf');
    }

    public function data_pemilik()
    {
        $patients = User::where('role', 'pasien')->orderBy('name', 'asc')->get();
        $data = ['patients' => $patients];
        $pdf = Pdf::loadView('pemilik.doc', $data);
        return $pdf->download('data_pemilik.pdf');
    }

    public function data_karyawan()
    {
        $employees = User::where('role', '!=', 'pasien')->orderBy('name', 'asc')->get();
        $data = ['employees' => $employees];
        $pdf = Pdf::loadView('karyawan.doc', $data);
        return $pdf->download('data_karyawan.pdf');
    }


    public function send()
    {
        return view('persuratan.buat', []);
    }

    public function formpersetujuantindakan()
    {
        return view('persuratan.formpersetujuantindakan', []);
    }

    public function docpersetujuantindakan(Request $request)
    {
        // return view('persuratan.coba', [
        //     "data" =>  $request,
        // ]);
        $data = ['data' => $request];
        $pdf = Pdf::loadView('persuratan.docpersetujuantindakan', $data);
        return $pdf->download('persetujuantindakan.pdf');
    }
}
