<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Models\User;
use Exception;
use DB;
use Auth;

class UserRepository
{
    public function update($id, $request)
    {
        try {

            DB::beginTransaction();
            
            $user = User::find($id);
            $user->fill($request->all())->update();

            $user->profiles()->detach($user->profiles);
            
            $profile = Profile::find($request['profiles']);
            $user->profiles()->attach($profile);

			DB::commit();

            return ['status' => true, 'id' => $user->id, 'message' => 'Usuário editado com sucesso.', 'code' => 'success'];
		} catch (Exception $e) {
			DB::rollBack();
			return [
                'status' => false, 
                'message' => 'Erro ao editar usuário. Exception: ' . $e->getMessage(), 
                'exception' => $e->getMessage(),
                'code' => 'danger',
                'id' => $user->id
            ];
		}
    }

    public function save($request)
    {
        try {

			DB::beginTransaction();

            $user = new User($request->all());
            $user->save();

            $profile = Profile::find($request['profiles']);

            $user->profiles()->attach($profile);

			DB::commit();

            return ['status' => true, 'id' => $user->id, 'message' => 'Usuário cadastrado com sucesso.', 'code' => 'success'];
		} catch (Exception $e) {
			DB::rollBack();
			return [
                'status' => false, 
                'message' => 'Erro ao cadastrar usuário. Exception: ' . $e->getMessage(), 
                'exception' => $e->getMessage(),
                'code' => 'danger'
            ];
		}
    }
}