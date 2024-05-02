<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PetController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\AttendanceController;
use App\Http\Controllers\API\AppointmentController;
use App\Http\Controllers\API\VerifyEmailController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\MedicalRecordController;
use App\Http\Controllers\API\CorrespondenceController;
use App\Http\Controllers\API\ForgotPasswordController;
use App\Models\Attendance;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgot']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    // User
    Route::get('/user', [AuthController::class, 'user']); //get user login
    Route::get('/alluser', [AuthController::class, 'alluser']); //get user login
    Route::put('/user', [AuthController::class, 'update']); //update user login
    Route::put('/updatepassword', [AuthController::class, 'updatePassword']); //update user login
    Route::get('/user/dokter', [AuthController::class, 'allUserDokter']); // all user doktor
    Route::post('/email/resend', [VerifyEmailController::class, 'resend']);


    // Pet
    Route::get('/pet', [PetController::class, 'index']); // all
    Route::get('/pet/count', [PetController::class, 'count']); // all
    Route::get('/pet/user/{id}', [PetController::class, 'show']); // all by user id
    Route::get('/pet/user', [PetController::class, 'showByUserLogin']); // by user login
    Route::post('/pet', [PetController::class, 'store']); // create
    Route::put('/pet/{id}', [PetController::class, 'update']); // update
    Route::delete('/pet/{id}', [PetController::class, 'destroy']); // delete


    // Appointment
    Route::get('/appointment', [AppointmentController::class, 'index']); // all
    Route::get('/appointment/user', [AppointmentController::class, 'showByUserLogin']); // by user login
    Route::get('/appointment/notavailable/{doctor}/{date}', [AppointmentController::class, 'byDoctorDate']); // by user login
    Route::post('/appointment', [AppointmentController::class, 'store']); // create
    Route::put('/appointment/{id}', [AppointmentController::class, 'update']); // update
    Route::delete('/appointment/{id}', [AppointmentController::class, 'destroy']); // delete


    // Medicine
    Route::get('/medicine', [MedicineController::class, 'index']); // all

    // Medical Record
    Route::get('/medicalrecord/pet/{id}', [MedicalRecordController::class, 'show']); // all by pet id

    // Attendance
    Route::get('/attendance/user', [AttendanceController::class, 'showByUserLogin']); // all by  user login
    Route::get('/attendance/today', [AttendanceController::class, 'todayUserLogin']); // today user login
    Route::get('/attendance/monthly/{date}', [AttendanceController::class, 'byUserLoginMonthly']); // monthly user login
    Route::post('/attendance', [AttendanceController::class, 'store']); // create
    Route::put('/attendance/{id}', [AttendanceController::class, 'update']); // update

    // Correspondence
    Route::get('/correspondence/user', [CorrespondenceController::class, 'showByUserLogin']); // by user login
    Route::put('/correspondence/{id}', [CorrespondenceController::class, 'update']); // update post

    // Notification
    Route::get('/notification/user', [NotificationController::class, 'showByUserLogin']); // by user login
    Route::put('/notification/user', [NotificationController::class, 'markAllAsRead']); //isread = 1
});
