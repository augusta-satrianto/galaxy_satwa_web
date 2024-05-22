<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\CorrespondenceController;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/verifikasiberhasil', [DashboardController::class, 'verifikasi']);
Route::get('/perbaruipasswordberhasil', [DashboardController::class, 'resetpassword']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Auth::routes(['verify' => true]);
Route::get('getHewan/{id}', function ($id) {
    $hewan = App\Models\Pet::where('user_id', $id)->get();
    return response()->json($hewan);
});
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', [DashboardController::class, 'index']);

    // Rekam Medis
    Route::get('/rekammedis', [MedicalRecordController::class, 'index']);
    Route::get('/rekammedis/{pet:id}', [MedicalRecordController::class, 'show']);
    Route::get('/rekammedis/{pet:id}/buat', [MedicalRecordController::class, 'create'])->middleware('doctor');
    Route::post('/rekammedis/{pet:id}', [MedicalRecordController::class, 'store'])->middleware('doctor');;
    Route::get('/rekammedis/{record:id}/edit', [MedicalRecordController::class, 'edit'])->middleware('doctor');
    Route::put('/rekammedis/{petId}/{recordId}', [MedicalRecordController::class, 'update'])->middleware('doctor');
    Route::delete('/rekammedis/{petId}/{recordId}', [MedicalRecordController::class, 'destroy'])->middleware('doctor');

    // Jadwal
    Route::get('/jadwal', [AppointmentController::class, 'index']);
    Route::get('/jadwal/buat', [AppointmentController::class, 'create'])->middleware('admin');
    Route::post('/jadwal', [AppointmentController::class, 'store'])->middleware('admin');
    Route::post('/vaksinasi', [ScheduleController::class, 'storevaksin'])->middleware('admin');;
    Route::post('/imunisasi', [ScheduleController::class, 'storeimun'])->middleware('admin');;
    Route::put('/jadwal/batalkan/{appointment:id}', [AppointmentController::class, 'update'])->middleware('admin');
    Route::put('/vaksinimun/batalkan/{schedule:id}', [ScheduleController::class, 'update'])->middleware('admin');

    // Persuratan
    Route::get('/persuratan', [LetterController::class, 'index']);
    Route::get('/persuratan/kirim', [LetterController::class, 'create']);
    Route::post('/persuratan/kirim', [LetterController::class, 'store']);
    Route::get('/rekammedis/{pet:id}/unduh', [CorrespondenceController::class, 'rekam_medis']); //Rekam Medis
    Route::get('/obat/unduh', [CorrespondenceController::class, 'data_obat']); //Obat
    Route::get('/hewan/unduh', [CorrespondenceController::class, 'data_hewan']); //Hewan
    Route::get('/pemilik/unduh', [CorrespondenceController::class, 'data_pemilik']); //Pemilik
    Route::get('/karyawan/unduh', [CorrespondenceController::class, 'data_karyawan']); //Karyawan
    Route::get('/persuratan/buat', [CorrespondenceController::class, 'send']);
    Route::get('/persuratan/buat/persetujuantindakan', [CorrespondenceController::class, 'formpersetujuantindakan']);
    Route::post('/persuratan/buat/persetujuantindakan', [CorrespondenceController::class, 'docpersetujuantindakan']);
    Route::get('/persuratan/buat/beritakematian', [CorrespondenceController::class, 'formberitakematian']);
    Route::post('/persuratan/buat/beritakematian', [CorrespondenceController::class, 'docberitakematian']);
    Route::get('/persuratan/buat/rawatinap', [CorrespondenceController::class, 'formrawatinap']);
    Route::post('/persuratan/buat/rawatinap', [CorrespondenceController::class, 'docrawatinap']);
    Route::get('/persuratan/buat/tindakanoperasi', [CorrespondenceController::class, 'formtindakanoperasi']);
    Route::post('/persuratan/buat/tindakanoperasi', [CorrespondenceController::class, 'doctindakanoperasi']);
    Route::get('/persuratan/buat/vaksinasi', [CorrespondenceController::class, 'formvaksinasi']);
    Route::post('/persuratan/buat/vaksinasi', [CorrespondenceController::class, 'docvaksinasi']);
    Route::get('/persuratan/buat/rawatjalan', [CorrespondenceController::class, 'formrawatjalan']);
    Route::post('/persuratan/buat/rawatjalan', [CorrespondenceController::class, 'docrawatjalan']);
    Route::get('/persuratan/buat/titipsehat', [CorrespondenceController::class, 'formtitipsehat']);
    Route::post('/persuratan/buat/titipsehat', [CorrespondenceController::class, 'doctitipsehat']);
    Route::get('/persuratan/buat/kelahiran', [CorrespondenceController::class, 'formkelahiran']);
    Route::post('/persuratan/buat/kelahiran', [CorrespondenceController::class, 'dockelahiran']);
    Route::get('/persuratan/buat/skkh', [CorrespondenceController::class, 'formskkh']);
    Route::post('/persuratan/buat/skkh', [CorrespondenceController::class, 'docskkh']);

    // Obat
    Route::get('/obat', [MedicineController::class, 'index']);
    Route::get('/obat/tambah', [MedicineController::class, 'create'])->middleware('admin');
    Route::post('/obat', [MedicineController::class, 'store'])->middleware('admin');
    Route::get('/obat/{medicine:id}/edit', [MedicineController::class, 'edit'])->middleware('admin');
    Route::put('/obat/{medicine:id}', [MedicineController::class, 'update'])->middleware('admin');
    Route::delete('/obat/{medicine:id}', [MedicineController::class, 'destroy'])->middleware('admin');

    // Hewan
    Route::get('/hewan', [PetController::class, 'index']);

    // Pemilik
    Route::get('/pemilik', [PatientController::class, 'index']);

    // Karyawan
    Route::get('/karyawan', [EmployeeController::class, 'index']);
    Route::get('/karyawan/tambah', [EmployeeController::class, 'create'])->middleware('admin');
    Route::post('/karyawan', [EmployeeController::class, 'store'])->middleware('admin');
    Route::get('/karyawan/{user:id}/edit', [EmployeeController::class, 'edit'])->middleware('admin');
    Route::put('/karyawan/{user:id}', [EmployeeController::class, 'update'])->middleware('admin');
    Route::delete('/karyawan/{user:id}', [EmployeeController::class, 'destroy'])->middleware('admin');
});

Route::get('back', function () {
    return back();
})->name('back');
