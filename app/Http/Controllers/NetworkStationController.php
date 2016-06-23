<?php

namespace App\Http\Controllers;


use App\DataTables\NetworkStationDataTable;
use App\Http\Requests\NetworkStationRequest;
use App\ImportableController;
use App\Models\Network;
use App\Models\NetworkStation;
use App\Models\Station;

class NetworkStationController extends Controller
{
    use ImportableController;

    public function index(NetworkStationDataTable $dataTable)
    {
        return $dataTable->render('network_station.index');
    }

    public function create()
    {
        $stations = Station::all();
        $networks = Network::all();
        return view('network_station.create', ['stations' => $stations, 'networks' => $networks]);
    }

    public function store(NetworkStationRequest $request)
    {
        $network_station = $request->persist();;

        if (is_array($network_station)) {
            return view('network_station.temp')->with('messages', $network_station);
        }
        if ($network_station->exists) {
            return redirect()->route('network_station.index');
        }
        return redirect()->back()->with('network_station', $network_station);
    }

    /**
     * Display the specified resource.
     *
     * @param  NetworkStation $network_station
     * @return \Illuminate\Http\Response
     */
    public function show(NetworkStation $network_station)
    {
        return view('network_station.show', ['network_station' => $network_station]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  NetworkStation $network_station
     * @return \Illuminate\Http\Response
     */
    public function edit(NetworkStation $network_station)
    {
        $stations = Station::all();
        $networks = Network::all();
        return view('network_station.edit', [
            'network_station' => $network_station,
            'stations' => $stations,
            'networks' => $networks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NetworkStationRequest $request
     * @param  NetworkStation $network_station
     * @return \Illuminate\Http\Response
     */
    public function update(NetworkStationRequest $request, NetworkStation $network_station)
    {
        $request->persist($network_station);
        return redirect()->route('network_station.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  NetworkStation $network_station
     * @return \Illuminate\Http\Response
     */
    public function destroy(NetworkStation $network_station)
    {
        if (!$this->authorize('destroy', $network_station)) {
            redirect()->route('network_station.index')->withErrors('401');
        }
        $network_station->delete();
        return redirect()->route('network_station.index');
    }


    public function exportToCsv()
    {
        return NetworkStation::toCsv();
    }
}