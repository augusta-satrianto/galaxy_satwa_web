<?php

namespace App\Http\Controllers\API;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    //all
    public function index()
    {
        return response([
            'data' => Pet::with(['user'])->orderBy('name', 'desc')->get()
        ], 200);
    }

    //count
    public function count()
    {
        return response([
            'kucing' => Pet::where('category', 'Kucing')->count(),
            'anjing' => Pet::where('category', 'Anjing')->count(),
            'kelinci' => Pet::where('category', 'Kelinci')->count(),
            'burung' => Pet::where('category', 'Burung')->count(),
            'ular' => Pet::where('category', 'Ular')->count(),
            'hamster' => Pet::where('category', 'Hamster')->count(),
        ], 200);
    }

    //by user id
    public function show($id)
    {
        return response([
            'data' => Pet::where('user_id', $id)->get()
        ], 200);
    }

    //by user login
    public function showByUserLogin()
    {
        return response([
            'data' => Pet::where('user_id', Auth::id())->get()
        ], 200);
    }


    //create
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'type' => 'required|string',
            'old' => 'required|string',
            'gender' => 'required|string',
            'tatto' => 'required',
            'color' => 'required|string',
        ]);

        $image = $this->saveImage($request->image, 'pet');

        $pet = Pet::create([
            'user_id' => Auth::id(),
            'name' => $attrs['name'],
            'category' => $attrs['category'],
            'type' => $attrs['type'],
            'old' => $attrs['old'],
            'gender' => $attrs['gender'],
            'color' => $attrs['color'],
            'tatto' => $attrs['tatto'],
            'image' => $image
        ]);

        return response([
            'message' => 'post created.',
            'data' => $pet
        ], 200);
    }

    // update
    public function update(Request $request, $id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response([
                'message' => 'Post not found.'
            ], 403);
        }

        //validate fields
        $attrs = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'old' => 'required|string',
            'gender' => 'required|string',
            'tatto' => 'required',
            'color' => 'required|string',
        ]);

        $image = $this->saveImage($request->image, 'pet');

        if ($image == null) {
            $pet->update([
                'name' => $attrs['name'],
                'type' => $attrs['type'],
                'old' => $attrs['old'],
                'gender' => $attrs['gender'],
                'color' => $attrs['color'],
                'tatto' => $attrs['tatto'],
            ]);
        } else {
            $pet->update([
                'name' => $attrs['name'],
                'type' => $attrs['type'],
                'old' => $attrs['old'],
                'gender' => $attrs['gender'],
                'color' => $attrs['color'],
                'tatto' => $attrs['tatto'],
                'image' => $image
            ]);
        }

        return response([
            'message' => 'Post updated.',
            'data' => $pet
        ], 200);
    }


    //delete
    public function destroy($id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response([
                'message' => 'Post not found.'
            ], 403);
        }
        $pet->delete();

        return response([
            'message' => 'Pet deleted.'
        ], 200);
    }
}
