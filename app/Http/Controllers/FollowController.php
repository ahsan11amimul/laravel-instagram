<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(User $user)
    {   
        //return ['success'];
        //return auth()->user()->following()->toggle($user->profile);
        //return auth()->user()->following()->toggle($user->profile);
        return ['suucces'=>auth()->user()->following()->toggle($user->profile)];
    }
}
