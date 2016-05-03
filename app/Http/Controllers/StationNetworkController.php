<?php

namespace App\Http\Controllers;


use App\DataTables\StationNetworkDataTable;
use App\Http\Requests\NetworkRequest;
use App\Http\Requests\StationNetworkRequest;
use App\Models\Network;
use App\Models\Station;
use App\Models\StationNetwork;

class StationNetworkController extends Controller
{
    public function index(StationNetworkDataTable $dataTable)
    {
        return $dataTable->render('station_networks.index');
    }

    public function create()
    {
        $stations = Station::all();
        $networks = Network::all();
        return view('station_networks.create', ['stations' => $stations, 'networks' => $networks]);
    }

    public function store(StationNetworkRequest $request)
    {
        $request->persist();
        return redirect()->route('station_networks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  StationNetwork  $sampleSite
     * @return \Illuminate\Http\Response
     */
    public function show(StationNetwork $station_network)
    {
        return view('station_networks.show', ['station_network' => $station_network]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StationNetwork  $station_network
     * @return \Illuminate\Http\Response
     */
    public function edit(StationNetwork $station_network)
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
     * \App\Http\Requests\StationNetworkRequest  $request
     * @param  StationNetwork  $station_network
     * @return \Illuminate\Http\Response
     */
    public function update(StationNetworkRequest $request, StationNetwork $station_network)
    {
        $request->persist($station_network);
        return redirect()->route('station_networks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  StationNetwork  $station_network
     * @return \Illuminate\Http\Response
     */
    public function destroy(StationNetwork $station_network)
    {
        if(!$this->authorize('destroy', $station_network)) {
            redirect()->route('station_networks.index')->withErrors('401');
        }
        $station_network->delete();
        return redirect()->route('station_networks.index');
    }
}