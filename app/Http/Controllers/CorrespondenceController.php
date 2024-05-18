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
        return view('persuratan.persetujuantindakan.form', []);
    }

    public function docpersetujuantindakan(Request $request)
    {
        $data = ['data' => $request, 'today' => Carbon::now()->format('d / m / Y')];
        $pdf = Pdf::loadView('persuratan.persetujuantindakan.doc', $data);
        return $pdf->download('persetujuantindakan.pdf');
    }

    public function formberitakematian()
    {
        return view('persuratan.beritakematian.form', []);
    }

    public function docberitakematian(Request $request)
    {
        $data = ['data' => $request, 'today' => Carbon::now()->format('d / m / Y')];
        $pdf = Pdf::loadView('persuratan.beritakematian.doc', $data);
        return $pdf->download('beritakematian.pdf');
    }

    public function formrawatinap()
    {
        return view('persuratan.rawatinap.form', []);
    }

    public function docrawatinap(Request $request)
    {
        $data = ['data' => $request, 'today' => Carbon::now()->format('d / m / Y')];
        $pdf = Pdf::loadView('persuratan.rawatinap.doc', $data);
        return $pdf->download('rawatinap.pdf');
    }

    public function formtindakanoperasi()
    {
        return view('persuratan.tindakanoperasi.form', []);
    }

    public function doctindakanoperasi(Request $request)
    {
        $data = ['data' => $request, 'today' => Carbon::now()->format('d / m / Y')];
        $pdf = Pdf::loadView('persuratan.tindakanoperasi.doc', $data);
        return $pdf->download('tindakanoperasi.pdf');
    }

    public function formvaksinasi()
    {
        return view('persuratan.vaksinasi.form', []);
    }

    public function docvaksinasi(Request $request)
    {
        $data = ['data' => $request, 'today' => Carbon::now()->format('d / m / Y')];
        $pdf = Pdf::loadView('persuratan.vaksinasi.doc', $data);
        return $pdf->download('vaksinasi.pdf');
    }

    public function formrawatjalan()
    {
        return view('persuratan.rawatjalan.form', []);
    }

    public function docrawatjalan(Request $request)
    {
        $data = ['data' => $request, 'today' => Carbon::now()->format('d / m / Y')];
        $pdf = Pdf::loadView('persuratan.rawatjalan.doc', $data);
        return $pdf->download('rawatjalan.pdf');
    }

    public function formtitipsehat()
    {
        return view('persuratan.titipsehat.form', []);
    }

    public function doctitipsehat(Request $request)
    {
        $data = ['data' => $request, 'today' => Carbon::now()->format('d / m / Y')];
        $pdf = Pdf::loadView('persuratan.titipsehat.doc', $data);
        return $pdf->download('titipsehat.pdf');
    }

    public function formkelahiran()
    {
        return view('persuratan.kelahiran.form', []);
    }

    public function dockelahiran(Request $request)
    {
        $data = ['data' => $request, 'today' => Carbon::now()->format('d / m / Y')];
        $pdf = Pdf::loadView('persuratan.kelahiran.doc', $data);
        return $pdf->download('kelahiran.pdf');
    }

    public function formskkh()
    {
        return view('persuratan.skkh.form', []);
    }

    public function docskkh(Request $request)
    {
        $data = ['data' => $request, 'today' => Carbon::now()->format('d / m / Y')];
        $pdf = Pdf::loadView('persuratan.skkh.doc', $data);
        return $pdf->download('skkh.pdf');
    }
}
