<?php

namespace App\Repositories;

use App\Models\Station;
use App\Models\Reader;
use Exception;
use DB;
use Auth;

class StationRepository
{
    public function update($id, $data)
    {
        try {

            DB::beginTransaction();
            
            Reader::where('station_id', '=', $id)->delete();

            $station = Station::find($id);
            $station->fill($data->all())->update();

            for ($i = 1; $i < $data['number_readers'] + 1; $i++) { 
                $reader = new Reader();
                $reader->station_id = $station->id;
                $reader->ip = $data['ip' . $i];
                $reader->type = $data['reader_type' . $i];
                $reader->position = $data['position' . $i];
                $reader->save();
            }

			DB::commit();

            return ['status' => true, 'id' => $station->id, 'message' => 'Estação editada com sucesso.'];
		} catch (Exception $e) {
			DB::rollBack();
			return [
                'status' => false, 
                'message' => 'Erro ao editar estação. Exception: ' . $e->getMessage(), 
                'exception' => $e->getMessage()
            ];
		}
    }

    public function save($data)
    {
        try {
			DB::beginTransaction();

            $station = new Station($data->all());
            $station->save();

            for ($i = 1; $i < $data['number_readers'] + 1; $i++) { 
                $reader = new Reader();
                $reader->station_id = $station->id;
                $reader->ip = $data['ip' . $i];
                $reader->type = $data['reader_type' . $i];
                $reader->position = $data['position' . $i];
                $reader->save();
            }

			DB::commit();

            return ['status' => true, 'id' => $station->id, 'message' => 'Estação cadastrada com sucesso.'];
		} catch (Exception $e) {
			DB::rollBack();
			return [
                'status' => false, 
                'message' => 'Erro ao cadastrar estação. Exception: ' . $e->getMessage(), 
                'exception' => $e->getMessage()
            ];
		}
        
    }
}