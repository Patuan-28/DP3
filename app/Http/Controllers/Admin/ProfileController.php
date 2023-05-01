<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User AS Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Profile::where('id',Auth::user()->id)
            ->where('name','like','%'.$keywords.'%')
            ->paginate(10);
            return view('page.admin.profile.list', compact('collection'));
        }
        return view('page.admin.profile.main');
    }
    public function create()
    {

    }
    public function store()
    {
        
    }
    public function show(Profile $profile)
    {
        //
    }
    public function edit(Profile $profile)
    {
        return view('page.admin.profile.input', compact('profile'));
    }
    public function update(Request $request, Profile $profile)
    {
        if(request()->file('photo')){
            Storage::delete($profile->photo);
            $photo = request()->file('photo')->store("avatar");
            $profile->photo = $photo;
        }
        if($request->password){
            $profile->password = Hash::make($request->password);
        }
        $profile->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Profil Terupdate',
        ]);
    }
    public function destroy(Profile $profile)
    {
      
    }
}
