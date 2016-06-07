<?php

namespace App\DataTables;

use App\Models\SampleSite;
use App\Models\Station;
use App\User;
use Yajra\Datatables\Services\DataTable;

class SampleSiteDataTable extends DataTable
{

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn("action", function ($sampleSite){
                return view('sample_sites.actions')->with('sample_site', $sampleSite);
            })
            ->addColumn('position', function($sampleSite){
                return $sampleSite->position;
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $sampleSites = SampleSite::query();
        return $this->applyScopes($sampleSites);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '70px'])
                    ->parameters(array_merge($this->getBuilderParameters(), ['language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json',
                    ],
                        'order' => [[1, 'asc']]
                    ]));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            ['data' => 'id', 'visible' => false],
            ['data' => 'code', 'title' => trans('sample_sites.code'),],
            ['data' => 'name', 'title' => trans('sample_sites.name'),],
            ['data' => 'position', 'title' => trans('sample_sites.position')],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sample_sites';
    }
}
