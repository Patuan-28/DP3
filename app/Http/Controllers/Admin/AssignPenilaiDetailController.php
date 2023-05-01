<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use App\Models\User as AssignPenilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AssignPenilaiDetailController extends Controller
{
    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = AssignPenilai::where('role', '!=', 's')
                ->where('name', 'like', '%' . $keywords . '%')
                ->paginate(10);
            $users = AssignPenilai::where('id', $id)->get('id');
            return view('page.admin.assignPenilaiDetail.list', compact('collection', 'users'));
        }
        return view('page.admin.assignPenilaiDetail.main');
    }
    public function create()
    {
        return view('page.admin.assignPenilai.input', ['assignPenilai' => new AssignPenilai]);
    }
    public function store(Request $request, $id)
    {
        $penilai = Penilaian::get();
        $penilaian = new Penilaian();
        $previousUrl = url()->previous();
        $id_trim = Str::of($previousUrl)->afterLast('/')->__toString();
        foreach ($penilai as $p) {
            if ($p->user_id == $id && $p->penilai_id == $id_trim) {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Penilai sudah diassgin pada user ini',
                ]);
            }
        }
        $penilaian->penilai_id = $id_trim;
        $penilaian->user_id = $id;
        $penilaian->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Penilai ' . $request->name . ' berhasil di assign',
        ]);
    }
    public function show(Request $request, AssignPenilai $assignPenilai)
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
