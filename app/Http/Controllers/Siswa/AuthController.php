<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:siswa')->except('do_logout');
    }
    public function index()
    {
        return view('page.siswa.auth.main');
    }
    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        if (Auth::guard('siswa')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'm'], $request->remember)) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Welcome back ' . Auth::guard('siswa')->user()->name,
            ]);
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
    }
    public function do_logout()
    {
        $user = Auth::guard('siswa')->user();
        Auth::logout($user);
        return redirect()->route('siswa.auth.index');
    }
}
