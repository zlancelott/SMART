<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Models\Page;
use Exception;
use DB;
use Auth;

class PageRepository extends LogRepository
{
    public function update($id, $request)
    {
        try {

            DB::beginTransaction();
            
            $page = Page::find($id);
            $page->fill($request->all())->update();

            $page->profiles()->detach($page->profiles);
            
            $profile = Profile::find($request['profiles']);

            $page->profiles()->attach($profile, $request->only(['view', 'create', 'edit', 'delete']));

			DB::commit();

            return ['status' => true, 'id' => $page->id, 'message' => 'Página editada com sucesso.', 'code' => 'success'];
		} catch (Exception $e) {
			DB::rollBack();
			return [
                'status' => false, 
                'message' => 'Erro ao editar página. Exception: ' . $e->getMessage(), 
                'exception' => $e->getMessage(),
                'code' => 'danger',
                'id' => $page->id
            ];
		}
    }

    public function save($request)
    {
        try {

            DB::beginTransaction();
            
            $page = new Page($request->all());
            $page->save();

            $profile = Profile::find($request['profiles']);

            $page->profiles()->attach($profile, $request->only(['view', 'create', 'edit', 'delete']));

			DB::commit();

            return ['status' => true, 'id' => $page->id, 'message' => 'Usuário cadastrado com sucesso.', 'code' => 'success'];
		} catch (Exception $e) {
			DB::rollBack();
			return [
                'status' => false, 
                'message' => 'Erro ao cadastrar página. Exception: ' . $e->getMessage(), 
                'exception' => $e->getMessage(),
                'code' => 'danger'
            ];
		}
    }
}