<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyProfileRequest;
use Illuminate\Http\Request;
use Auth;

class MyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        return view('my-profile.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MyProfileRequest $request, $id)
    {
        $userData = [];

        if (!empty($request['password']))
        {
            $userData = $request->only(['name', 'email', 'password']);
        }
        else 
        {
            $userData = $request->only(['name', 'email']);
        }

        $user = Auth::user();
        
        $user->fill($userData)->update();

        if ($user) {
            return redirect()->route('my-profile.index')
                            ->with(['message' => 'Perfil editado com sucesso.', 'code' => 'success']);
        } else {
            return redirect()->route('my-profile.index')
                             ->with(['message' => 'Erro ao editar perfil. Tente novamente!', 'code' => 'danger']);
        }
    }
}
