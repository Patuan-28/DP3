<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User AS Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Admin::where('role','=','a')
            ->where('name','like','%'.$keywords.'%')
            ->paginate(10);
            return view('page.admin.admin.list', compact('collection'));
        }
        return view('page.admin.admin.main');
    }
    public function create()
    {
        return view('page.admin.admin.input', ['admin' => new Admin]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|unique:users|min:9|max:15',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = new Admin;
        $user->name = Str::title($request->name);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 'a';
        $user->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Admin '. $request->name . ' tersimpan',
        ]);
    }
    public function show(Admin $admin)
    {
        //
    }
    public function edit(Admin $admin)
    {
        return view('page.admin.admin.input', compact('admin'));
    }
    public function update(Request $request, Admin $admin)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|max:255',
            'phone' => 'required|min:9|max:15',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }
        }
        $admin->name = Str::title($request->name);
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        if($request->password){
            $admin->password = Hash::make($request->password);
        }
        $admin->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Admin '. $request->name . ' terupdate',
        ]);
    }
    public function destroy(Admin $admin)
    {
        Storage::delete($admin->photo);
        $admin->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Admin '. $admin->name . ' terhapus',
        ]);
    }
}
