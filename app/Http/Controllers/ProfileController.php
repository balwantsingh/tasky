<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');            
    }

    public function edit_profile(User $userProfile)
    {
        Gate::authorize('update', $userProfile);
        
        return view('profile.auth-profile', compact('userProfile'));
    }
}
