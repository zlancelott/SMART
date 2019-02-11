<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::paginate(30);

        return view('profile.index', compact('profiles'));
    }

}
