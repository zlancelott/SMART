<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::paginate(30);

        return view('profile.index', compact('profiles'));
    }
}
