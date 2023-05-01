<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User as Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Staff::where('role', '=', 's')
                ->where('name', 'like', '%' . $keywords . '%')
                ->paginate(10);
            return view('page.admin.staff.list', compact('collection'));
        }
        return view('page.admin.staff.main');
    }
    public function create()
    {
        return view('page.admin.staff.input', ['staff' => new Staff]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nidn' => 'required',
            'date_birth' => 'required',
            'place_birth' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'gender' => 'required',
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
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            } elseif ($errors->has('nidn')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nidn'),
                ]);
            } elseif ($errors->has('date_birth')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('date_birth'),
                ]);
            } elseif ($errors->has('place_birth')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('place_birth'),
                ]);
            } elseif ($errors->has('address')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('address'),
                ]);
            } elseif ($errors->has('religion')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('religion'),
                ]);
            } elseif ($errors->has('gender')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('gender'),
                ]);
            } elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = new Staff;
        $user->nidn = $request->nidn;
        $user->name = Str::title($request->name);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 's';
        $user->date_birth = $request->date_birth;
        $user->place_birth = $request->place_birth;
        $user->address = $request->address;
        $user->religion = $request->religion;
        $user->gender = $request->gender;
        $user->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'staff ' . $request->name . ' tersimpan',
        ]);
    }
    public function show(Staff $staff)
    {
        //
    }
    public function edit(Staff $staff)
    {
        return view('page.admin.staff.input', compact('staff'));
    }
    public function update(Request $request, Staff $staff)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nidn' => 'required',
            'date_birth' => 'required',
            'place_birth' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'gender' => 'required',
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
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } elseif ($errors->has('nidn')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nidn'),
                ]);
            } elseif ($errors->has('date_birth')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('date_birth'),
                ]);
            } elseif ($errors->has('place_birth')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('place_birth'),
                ]);
            } elseif ($errors->has('address')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('address'),
                ]);
            } elseif ($errors->has('religion')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('religion'),
                ]);
            } elseif ($errors->has('gender')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('gender'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }
        }
        if ($staff->phone != $request->phone) {
            $staff->phone = $request->phone;
        }
        $staff->nidn = $request->nidn;
        $staff->name = Str::title($request->name);
        $staff->email = $request->email;
        $staff->date_birth = $request->date_birth;
        $staff->place_birth = $request->place_birth;
        $staff->address = $request->address;
        $staff->religion = $request->religion;
        $staff->gender = $request->gender;
        if ($request->password) {
            $staff->password = Hash::make($request->password);
        }
        $staff->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Staff ' . $request->name . ' terupdate',
        ]);
    }
    public function destroy(Staff $staff)
    {
        Storage::delete($staff->photo);
        $staff->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Staff ' . $staff->name . ' terhapus',
        ]);
    }
}
