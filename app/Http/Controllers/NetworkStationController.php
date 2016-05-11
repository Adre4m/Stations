<?php

namespace App\Http\Controllers;


use App\DataTables\NetworkStationDataTable;
use App\Http\Requests\NetworkRequest;
use App\Http\Requests\NetworkStationRequest;
use App\Models\Network;
use App\Models\Station;
use App\Models\NetworkStation;

class NetworkStationController extends Controller
{
    public function index(NetworkStationDataTable $dataTable)
    {
        return $dataTable->render('station_networks.index');
    }

    public function create()
    {
        $stations = Station::all();
        $networks = Network::all();
        return view('station_networks.create', ['stations' => $stations, 'networks' => $networks]);
    }

    public function store(NetworkStationRequest $request)
    {
        $request->persist();
        return redirect()->route('station_networks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  NetworkStation  $sampleSite
     * @return \Illuminate\Http\Response
     */
    public function show(NetworkStation $station_network)
    {
        return view('station_networks.show', ['station_network' => $station_network]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  NetworkStation  $station_network
     * @return \Illuminate\Http\Response
     */
    public function edit(NetworkStation $station_network)
    {
        $stations = Station::all();
        $networks = Network::all();
        return view('station_networks.edit', [
            'station_network' => $station_network,
            'stations' => $stations,
            'networks' => $networks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * \App\Http\Requests\NetworkStationRequest  $request
     * @param  NetworkStation  $station_network
     * @return \Illuminate\Http\Response
     */
    public function update(NetworkStationRequest $request, NetworkStation $station_network)
    {
        $request->persist($station_network);
        return redirect()->route('station_networks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  NetworkStation  $station_network
     * @return \Illuminate\Http\Response
     */
    public function destroy(NetworkStation $station_network)
    {
        if(!$this->authorize('destroy', $station_network)) {
            redirect()->route('station_networks.index')->withErrors('401');
        }
        $station_network->delete();
        return redirect()->route('station_networks.index');
    }
}