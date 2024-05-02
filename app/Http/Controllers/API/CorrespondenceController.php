<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Correspondence;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CorrespondenceController extends Controller
{

    public function showByUserLogin()
    {
        $correspondences = Correspondence::where('patient_id', Auth::id())
            ->orWhere('doctor_id', Auth::id())
            ->get();

        // Ubah format waktu sesuai dengan zona waktu yang diinginkan
        $correspondences->transform(function ($correspondence) {
            $correspondence->created_at = Carbon::parse($correspondence->created_at)
                ->setTimezone('Asia/Jakarta')
                ->toDateTimeString();
            $correspondence->updated_at = Carbon::parse($correspondence->updated_at)
                ->setTimezone('Asia/Jakarta')
                ->toDateTimeString();
            return $correspondence;
        });

        return response(['data' => $correspondences], 200);
    }

    // update a post
    public function update(Request $request, $id)
    {
        $post = Correspondence::find($id);

        if (!$post) {
            return response([
                'message' => 'Post not found.'
            ], 403);
        }

        $file = $this->saveFile($request->reply_file, 'correspondence');

        if ($file == null) {
            // $post->update([
            //     'name' => $attrs['name'],
            //     'date_of_birth' => $attrs['date_of_birth'],
            //     'gender' => $attrs['gender'],
            //     'phone' => $attrs['phone'],
            //     'address' => $attrs['address'],
            // ]);
        } else {
            $post->update([
                'reply_file' => $file
            ]);
        }

        return response([
            'message' => 'Correspondence updated.',
        ], 200);
    }
}
