<?php

namespace App\Http\Controllers;


use App\DataTables\NetworkDataTable;
use App\Http\Requests\NetworkRequest;
use App\Models\Network;
use App\Models\Station;

class NetworkController extends Controller
{
    public function index(NetworkDataTable $dataTable)
    {
        return $dataTable->render('networks.index');
    }

    public function create()
    {
        $stations = Station::all();
        return view('networks.create', ['stations' => $stations])->with('network', new Network);
    }

    public function store(NetworkRequest $request)
    {
        $request->persist();
        return redirect()->route('networks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Network  $sampleSite
     * @return \Illuminate\Http\Response
     */
    public function show(Network $network)
    {
        return view('networks.show', ['network' => $network]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Network  $network
     * @return \Illuminate\Http\Response
     */
    public function edit(Network $network)
    {
        $stations = Station::all();
        return view('networks.edit', ['network' => $network, 'stations' => $stations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * \App\Http\Requests\NetworkRequest  $request
     * @param  Network  $network
     * @return \Illuminate\Http\Response
     */
    public function update(NetworkRequest $request, Network $network)
    {
        $request->persist($network);
        return redirect()->route('networks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Network  $network
     * @return \Illuminate\Http\Response
     */
    public function destroy(Network $network)
    {
        if(!$this->authorize('destroy', $network)) {
            redirect()->route('networks.index')->withErrors('401');
        }
        $network->delete();
        return redirect()->route('networks.index');
    }
}