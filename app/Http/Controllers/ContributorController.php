<?php

namespace App\Http\Controllers;

use App\DataTables\ContributorDataTable;
use App\Http\Requests\ContributorRequest;
use App\ImportableController;
use App\Models\Contributor;

use App\Http\Requests;

class ContributorController extends Controller
{
    use ImportableController;
    
    public function index(ContributorDataTable $dataTable)
    {
        return $dataTable->render('contributors.index');
    }


    public function create()
    {
        return view('contributors.create')->with('contributor', new Contributor);
    }

    public function store(ContributorRequest $request)
    {
        /** @var Contributor $contributor */
        $contributor = $request->persist();

        if (is_array($contributor)) {
            return view('contributors.temp')->with('messages', $contributor);
        }
        if ($contributor->exists) {
            return redirect()->route('contributors.index');
        }
        return redirect()->back()->with('contributor', $contributor);
    }


    public function show(Contributor $contributor)
    {
        return view('contributors.show', ['contributor' => $contributor]);
    }

    public function edit(Contributor $contributor)
    {
        return view('contributors.edit', ['contributor' => $contributor]);
    }

    public function update(ContributorRequest $request, Contributor $contributor)
    {
        $request->persist($contributor);
        return redirect()->route('contributors.index');
    }

    public function destroy(Contributor $contributor)
    {
        $contributor->delete();
        return redirect()->route('contributors.index');
    }

    public function exportToCsv()
    {
        return Contributor::toCsv();
    }
}
