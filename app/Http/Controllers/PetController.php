<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::orderBy('name', 'asc');
        if (request('hewan')) {
            $pets->where('name', 'like', '%' . request('hewan') . '%');
        }
        return view('hewan.index', [
            "title" => "Data Hewan",
            "active" => "hewan",
            "pets" => $pets->simplePaginate(10),
        ]);
    }
}
