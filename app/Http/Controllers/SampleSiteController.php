<?php

namespace App\Http\Controllers;


use App\DataTables\SampleSiteDataTable;
use App\Http\Requests\SampleSiteRequest;
use App\Models\SampleSite;
use App\Models\Station;
use Illuminate\Mail\Message;
use Mail;

class SampleSiteController extends Controller
{

    public function index(SampleSiteDataTable $dataTable)
    {
        return $dataTable->render('sample_sites.index');
    }

    public function create()
    {
        $stations = Station::all();
        return view('sample_sites.create', ['stations' => $stations])->with('sample_site', new SampleSite);
    }

    public function store(SampleSiteRequest $request)
    {
        $sample_site = $request->persist();

        if (is_array($sample_site)) {
            $user = auth()->user();
            Mail::send('sample_sites.temp', ['user' => $user, 'messages' => $sample_site],
                function ($message) use ($user) {
                    /** @var Message $message */
                    $message->from('no-reply-import-result@service.com', 'Import Result');
                    $message->to($user->email, $user->name)->subject('Import Result');
                });
            return redirect()->route('sample_sites.index');
        }
        if ($sample_site->exists) {
            return redirect()->route('sample_sites.index');
        }
        return redirect()->back()->with('sample_site', $sample_site);
    }

    /**
     * Display the specified resource.
     *
     * @param SampleSite $sample_site
     * @return \Illuminate\Http\Response
     */
    public function show(SampleSite $sample_site)
    {
        return view('sample_sites.show', ['sample_site' => $sample_site]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  SampleSite $sample_site
     * @return \Illuminate\Http\Response
     */
    public function edit(SampleSite $sample_site)
    {
        $stations = Station::all();
        return view('sample_sites.edit', ['sample_site' => $sample_site, 'stations' => $stations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\SampleSiteRequest $request
     * @param  SampleSite $sample_site
     * @return \Illuminate\Http\Response
     */
    public function update(SampleSiteRequest $request, SampleSite $sample_site)
    {
        $request->persist($sample_site);
        return redirect()->route('sample_sites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  SampleSite $sample_site
     * @return \Illuminate\Http\Response
     */
    public function destroy(SampleSite $sample_site)
    {
        if (!$this->authorize('destroy', $sample_site)) {
            redirect()->route('sample_sites.index')->withErrors('401');
        }
        $sample_site->delete();
        return redirect()->route('sample_sites.index');
    }

    public function exportToCsv()
    {
        return SampleSite::toCsv();
    }
}