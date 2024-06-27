<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees =  User::where('role', 'dokter')->orWhere('role', 'paramedis')->orderBy('name', 'asc');
        return view('karyawan.index', [
            "title" => "Data Pemilik",
            "active" => "karyawan",
            'employees' => $employees->simplePaginate(10),
        ]);
    }

    public function create()
    {
        return view('karyawan.create', []);
    }


    public function store(Request $request)
    {
        // dd($request->specialization);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'role' => 'required|max:255',
            'specialization' => 'max:255',
            'date_of_birth' => 'required',
            'gender' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'image' => 'image|max:5024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('profile', 'public');
        }

        $validatedData['image'] = 'http://galaxysatwa.my.id/storage/' . $validatedData['image'];
        $date_of_birth = Carbon::createFromFormat('d/m/Y', $validatedData['date_of_birth'])->format('Y-m-d');
        $validatedData['date_of_birth'] = $date_of_birth;
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['email_verified_at'] = now();

        $user =  User::create($validatedData);
        $user->sendEmailVerificationNotification();

        return redirect('/karyawan')->with('success', 'Berhasil menambahkan data karyawan');
    }

    public function edit(User $user)
    {
        return view('karyawan.edit', [
            'employee' => $user,
        ]);
    }


    public function update(Request $request, User $user)
    {
        // dd($request);
        $rules = [
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'date_of_birth' => 'required',
            'gender' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'image' => 'image|max:5024',
        ];


        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) {

            if ($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('profile', 'public');
            }
            $validatedData['image'] = 'http://galaxysatwa.my.id/storage/' . $validatedData['image'];
        }

        $date_of_birth = Carbon::createFromFormat('d/m/Y', $validatedData['date_of_birth'])->format('Y-m-d');
        $validatedData['date_of_birth'] = $date_of_birth;

        User::where('id', $user->id)->update($validatedData);
        return redirect('/karyawan')->with('success', 'Data karyawan diperbarui');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/karyawan')->with('success', 'Data karyawan berhasil dihapus');
    }
}
