<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Auth;

class UserController extends Controller
{

    // TODO: Validar ações para SUPERADMIN E ADMIN

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id')->paginate(30);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            
            User::create($request->all());
        
            return redirect()->route('user.index')
                            ->with(['message' => 'Usuário cadastrado com sucesso.', 'class' => 'alert-success']);
        } catch(Exception $ex) {

            return redirect()->route('user.create')
                            ->with(['message' => 'Erro ao cadastrar usuário. Tente novamente.', 'class' => 'alert-danger']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if ($user->profile == config('profiles.superadmin') && !Auth::user()->isSuperAdmin())
            abort(403, 'Permissão negada.');

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        try {

            if ($user->profile == config('profiles.superadmin') && !Auth::user()->isSuperAdmin())
                abort(403, 'Permissão negada.');
            
            $user->fill($request->all())->update();
        
            return redirect()->route('user.edit', ['id' => $user['id']])
                            ->with(['message' => 'Usuário Editado com sucesso.', 'class' => 'alert-success']);
        } catch(Exception $ex) {

            return redirect()->route('user.index')
                            ->with(['message' => 'Erro ao editar usuário. Tente novamente.', 'class' => 'alert-danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            
            $user->delete();
        
            return redirect()->route('user.index')
                            ->with(['message' => 'Usuário deletado com sucesso.', 'class' => 'alert-success']);
        } catch(Exception $ex) {

            return redirect()->route('user.index')
                            ->with(['message' => 'Erro ao deletear usuário. Tente novamente.', 'class' => 'alert-danger']);
        }
    }
}
