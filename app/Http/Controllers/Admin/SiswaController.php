<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User as Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Siswa::where('role', '=', 'm')
                ->where('name', 'like', '%' . $keywords . '%')
                ->paginate(10);
            return view('page.admin.siswa.list', compact('collection'));
        }
        return view('page.admin.siswa.main');
    }
    public function create()
    {
        return view('page.admin.siswa.input', ['siswa' => new Siswa]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nim' => 'required|min:1|max:11',
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
            } elseif ($errors->has('nim')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nim'),
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
        $user = new Siswa;
        $user->nim = $request->nim;
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
            'message' => 'Siswa ' . $request->name . ' tersimpan',
        ]);
    }
    public function show(Siswa $siswa)
    {
        //
    }
    public function edit(Siswa $siswa)
    {
        return view('page.admin.siswa.input', compact('siswa'));
    }
    public function update(Request $request, Siswa $siswa)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nim' => 'required|min:1|max:11',
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
            } elseif ($errors->has('nim')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nim'),
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
        if ($siswa->phone != $request->phone) {
            $siswa->phone = $request->phone;
        }
        $siswa->nim = $request->nim;
        $siswa->name = Str::title($request->name);
        $siswa->email = $request->email;
        $siswa->phone = $request->phone;
        $siswa->date_birth = $request->date_birth;
        $siswa->place_birth = $request->place_birth;
        $siswa->address = $request->address;
        $siswa->religion = $request->religion;
        $siswa->gender = $request->gender;
        if ($request->password) {
            $siswa->password = Hash::make($request->password);
        }
        $siswa->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Siswa ' . $request->name . ' terupdate',
        ]);
    }
    public function destroy(Siswa $siswa)
    {
        Storage::delete($siswa->photo);
        $siswa->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Siswa ' . $siswa->name . ' terhapus',
        ]);
    }
}
