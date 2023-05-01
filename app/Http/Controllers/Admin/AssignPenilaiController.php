<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User as AssignPenilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AssignPenilaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = AssignPenilai::where('role', '=', 's')
                ->where('name', 'like', '%' . $keywords . '%')
                ->paginate(10);
            return view('page.admin.assignPenilai.list', compact('collection'));
        }
        return view('page.admin.assignPenilai.main');
    }
    public function create()
    {
        return view('page.admin.assignPenilai.input', ['assignPenilai' => new AssignPenilai]);
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
            } elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = new AssignPenilai;
        $user->name = Str::title($request->name);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 'a';
        $user->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'assignPenilai ' . $request->name . ' tersimpan',
        ]);
    }
    public function show(AssignPenilai $assignPenilai)
    {
        $users = AssignPenilai::where('role', '!=', 's')->get();
        $item = AssignPenilai::find($assignPenilai);
        return view('page.admin.assignPenilai.show', ['item' => $item, 'users' => $users]);
    }
    public function edit(AssignPenilai $assignPenilai)
    {
        return view('page.admin.admin.input', compact('assignPenilai'));
    }
    public function update(Request $request, AssignPenilai $assignPenilai)
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
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }
        }
        $assignPenilai->name = Str::title($request->name);
        $assignPenilai->email = $request->email;
        $assignPenilai->phone = $request->phone;
        if ($request->password) {
            $assignPenilai->password = Hash::make($request->password);
        }
        $assignPenilai->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'assignPenilai ' . $request->name . ' terupdate',
        ]);
    }
    public function destroy(AssignPenilai $assignPenilai)
    {
        Storage::delete($assignPenilai->photo);
        $assignPenilai->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'assignPenilai ' . $assignPenilai->name . ' terhapus',
        ]);
    }
}
