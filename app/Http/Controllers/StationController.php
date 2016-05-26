<?php

namespace App\Http\Controllers;

use App\DataTables\StationDataTable;
use App\Http\Requests\StationRequest;
use App\Models\Contributor;
use App\Models\SampleSite;
use App\Models\Station;

use App\Http\Requests;
use Carbon\Carbon;
use Datatables;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StationDataTable $dataTable)
    {
        return $dataTable->render('stations.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $station = session('station', new Station);
        $contributors = Contributor::all();
        return view('stations.create', ['contributors' => $contributors])->with('station', $station);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StationRequest $request)
    {
        /** @var Station $station */
        $station = $request->persist();

        if($station->exists) {
            return redirect()->route('stations.index');
        }
        return redirect()->back()->with('station', $station);
    }

    /**
     * Display the specified resource.
     *
     * @param  Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        return view('stations.show', ['station' => $station,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        $contributors = Contributor::all();
        return view('stations.edit', ['station' => $station, 'contributors' => $contributors,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * \App\Http\Requests\StationRequest  $request
     * @param  Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(StationRequest $request, Station $station)
    {
        $request->persist($station);
        return redirect()->route('stations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        $this->authorize('destroy', $station);
        $station->delete();
        return redirect()->route('stations.index');
    }
}
