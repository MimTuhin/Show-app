<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $userProfile = Profile::where('user_id', auth()->user()->id)->first();
        
        return view('admin.users.profile', compact('userProfile'));
    }

public function profileUpdate(Request $request)
{
    // dd($request->all());
   $user =Profile::where('user_id', auth()->user()->id)->first();
   if($user == null){
    Profile::create([
        'user_id' => auth()->user()->id,
        'father_name' => $request->father_name,
    ]);
   }else{
    Profile::where('user_id', auth()->user()->id)->update([
        'father_name' => $request->father_name
    ]);
   }

   return redirect()->route('user.profile')->withSuccess('Profile updated Done');
}

}
