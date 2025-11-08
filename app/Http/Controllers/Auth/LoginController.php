<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

 public function login(Request $request)
{
    try {
        // Validate request data (either email or phone, plus password)
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $loginInput = $request->input('email'); // field can contain email or phone number
        $password = $request->input('password');
        $remember = $request->boolean('remember');

        // Determine if the input is an email or a phone number
        $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Attempt authentication with either email or phone
        if (Auth::attempt([$fieldType => $loginInput, 'password' => $password], $remember)) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'Login successful!',
                'redirect' => route('user.home'),
            ]);
        }

        // Authentication failed
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials provided.',
            'errors' => [
                'email' => [trans('auth.failed')],
            ],
        ], 422);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred during login. Please try again.',
            'error' => $e->getMessage(),
        ], 500);
    }
}



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}
