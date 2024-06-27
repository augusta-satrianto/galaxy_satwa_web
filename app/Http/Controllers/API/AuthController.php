<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiResponses;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ApiResponses;

    //Register User
    public function register(Request $request)
    {
        try {
            //Validate fields
            $attrs = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|min:8',
            ]);

            $user = User::create([
                'name' => $attrs['name'],
                'email' => $attrs['email'],
                'password' => bcrypt($attrs['password']),
            ]);

            $user->sendEmailVerificationNotification();

            // Return User
            return response([
                'status_code' => 200,
                'message' => 'Registration successful',
                'user' => $user,
            ], 200);
        } catch (ValidationException $validationException) {
            return $this->sendValidationErrorResponse($validationException);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Registration failed. Please try again.', 500);
        }
    }

    //Login user
    public function login(Request $request)
    {
        $attrs = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($attrs)) {
            return response([
                'message' => 'Invalid credentials.'
            ]);
        }

        User::where('device', $request->device)->where('id', '!=', Auth::id())->update(['device' => null]);
        auth()->user()->update([
            'device' => $request->device,
        ]);

        return response([
            'meta' => [
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Successfully authentication',
            ],
            'data' => [
                'user' => auth()->user(),
                'token' => $request->user()->createToken('secret')->plainTextToken
            ]
        ], 200);
    }

    //get user details
    public function user()
    {
        return response([
            'user' => auth()->user()
        ], 200);
    }

    //get all user
    public function allUser()
    {
        return response([
            'data' => User::where('role', '!=', 'admin')->orderBy('name', 'asc')->get()
        ], 200);
    }

    //get all user doktok
    public function allUserDokter()
    {
        return response([
            'data' => User::where('role', 'dokter')->orderBy('id', 'asc')->get()
        ], 200);
    }

    // update user
    public function update(Request $request)
    {

        $attrs = $request->validate([
            'name' => 'required|string',
            'date_of_birth' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $image = $this->saveImage($request->image, 'profile');

        if ($image == null) {
            auth()->user()->update([
                'name' => $attrs['name'],
                'date_of_birth' => $attrs['date_of_birth'],
                'gender' => $attrs['gender'],
                'phone' => $attrs['phone'],
                'address' => $attrs['address'],
            ]);
        } else {
            auth()->user()->update([
                'name' => $attrs['name'],
                'date_of_birth' => $attrs['date_of_birth'],
                'gender' => $attrs['gender'],
                'phone' => $attrs['phone'],
                'address' => $attrs['address'],
                'image' => $image
            ]);
        }

        return response([
            'message' => 'User updated.',
            'user' => auth()->user()
        ], 200);
    }

    // update user
    public function updatePassword(Request $request)
    {
        $attrs = $request->validate([
            'password' => 'required|min:8',
        ]);

        auth()->user()->update([
            'password' => bcrypt($attrs['password']),
        ]);

        return response([
            'message' => 'User updated.',
            'user' => auth()->user()
        ], 200);
    }
}
