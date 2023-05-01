<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:staff')->except('do_logout');
    }
    public function index()
    {
        return view('page.staff.auth.main');
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
        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 's'], $request->remember)) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Welcome back ' . Auth::guard('staff')->user()->name,
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
        $user = Auth::guard('staff')->user();
        Auth::logout($user);
        return redirect()->route('staff.auth.index');
    }
}
