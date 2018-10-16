<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Exception;
use Auth;

class UserController extends Controller
{
    protected $userRep;

    public function __construct(UserRepository $user)
    {
        $this->userRep = $user;
    }

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
        $profiles = Profile::orderBy('name')->get();
        
        return view('user.create', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = $this->userRep->save($request);

        if ($user['status']) {
            return redirect()->route('user.edit', ['id' => $user['id']])
                             ->with(['message' => $user['message'], 'code' => $user['code']]);
        } else {
            return redirect()->route('user.create')
                             ->with(['message' => $user['message'], 'code' => $user['code']]);
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
        $profiles = Profile::orderBy('name')->get();

        return view('user.edit', compact('user', 'profiles'));
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
        $user = $this->userRep->update($user->id, $request);

        if ($user['status']) {
            return redirect()->route('user.edit', ['id' => $user['id']])
                             ->with(['message' => $user['message'], 'code' => $user['code']]);
        } else {
            return redirect()->route('user.edit', ['id' => $user['id']])
                             ->with(['message' => $user['message'], 'code' => $user['code']]);
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
                            ->with(['message' => 'Usuário deletado com sucesso.', 'code' => 'success']);
        } catch(Exception $ex) {

            return redirect()->route('user.index')
                            ->with(['message' => 'Erro ao deletear usuário. Tente novamente.', 'code' => 'danger']);
        }
    }
}
