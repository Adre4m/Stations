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
                    ->addAction(['width' => '180.5px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            ['data' => 'id', 'title' => trans('sample_sites.id'),],
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
