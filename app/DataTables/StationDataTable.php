<?php

namespace App\DataTables;

use App\Models\Station;
use App\User;
use Yajra\Datatables\Services\DataTable;

class StationDataTable extends DataTable
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
            ->addColumn("action", function ($station){
                return view('stations.actions')->with('station', $station);
            })
            ->addColumn('manager', function($station){
                return $station->manager->fullname;
            })
            ->addColumn('owner', function($station){
                return $station->owner->fullname;
            })
            ->addColumn('position', function($station){
                return $station->position;
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
        return $this->applyScopes(Station::query());
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
                    ->addAction(['width' => '180.7px'])
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
            ['data' => 'code', 'title' => trans('stations.code'),],
            ['data' => 'name', 'title' => trans('stations.name'),],
            ['data' => 'position', 'title' => trans('stations.position')],
            ['data' => 'manager_id', 'visible' => false],
            ['data' => 'manager', 'title' => trans('contributors.manager')],
            ['data' => 'owner_id', 'visible' => false],
            ['data' => 'owner', 'title' => trans('contributors.owner')],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'stations';
    }
}
