<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    //
    public function show($user)
    {
        $user=User::findOrFail($user);
        $follows=(auth()->user())?auth()->user()->following->contains($user->id):false;
        return view('home',\compact('user','follows'));
    }
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }
    public function update(User $user)
    { 
        $this->authorize('update',$user->profile);
        $data=request()->validate([
          'title'=>'required',
          'description'=>'required',
          'url'=>'url',
          'image'=>''
        ]);
        if(\request('image'))
        {
        $imagePath=request('image')->store('profile','public');
        $image=Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save(); 
        $imageArray=['image'=>$imagePath];
        }
        $user->profile->update(array_merge($data,$imageArray??[]));
        return redirect("/profile/{$user->id}");
    }
}
