<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ReportController extends Controller
{
    public function create()
    {
        $users = User::all();

        // return view('relatorio.create', compact('users'));

        return \PDF::loadView('relatorio.create', compact('users'))
                    // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                    ->download('lista-usuarios.pdf');
    }
}
