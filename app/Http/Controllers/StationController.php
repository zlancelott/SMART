<?php

namespace App\Http\Controllers;

use App\Http\Requests\StationRequest;
use App\Repositories\StationRepository;
use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\Reader;
use App\Models\ReaderData;

class StationController extends Controller
{
    protected $stationRep;

    public function __construct(StationRepository $station)
    {
        $this->stationRep = $station;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::with('readers')->paginate(10);

        return view('station.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('station.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StationRequest $request)
    {
        $station = $this->stationRep->save($request);

        if ($station['status']) {
            return redirect()->route('station.edit', ['id' => $station['id']])
                             ->with(['message' => $station['message'], 'class' => 'alert-success']);
        } else {
            return redirect()->route('station.create')
                             ->with(['message' => $station['message'], 'class' => 'alert-danger']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        return view('station.edit', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StationRequest $request, Station $station)
    {
        $station = $this->stationRep->update($station->id, $request);

        if ($station['status']) {
            return redirect()->route('station.edit', ['id' => $station['id']])
                             ->with(['message' => $station['message'], 'class' => 'alert-success']);
        } else {
            return redirect()->route('station.create')
                             ->with(['message' => $station['message'], 'class' => 'alert-danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        try {
            
            $station->delete();
        
            return redirect()->route('station.index')
                            ->with(['message' => 'Estação deletada com sucesso.', 'class' => 'alert-success']);
        } catch(Exception $ex) {

            return redirect()->route('station.index')
                            ->with(['message' => 'Erro ao deletear estação. Tente novamente.', 'class' => 'alert-danger']);
        }
    }

    public function getInformations(Request $request) 
    {
        $readers = Reader::where('station_id', '=', $request['id'])->get(['id'])->toArray();

        // dd($readers);

        $lastInformation = ReaderData::whereIn('reader_id', $readers)->orderBy('created_at', 'desc')->first();

        // dd($lastInformation->code);
        
        return response()->json(['information' => $lastInformation]);
    }
}
