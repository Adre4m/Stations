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
            ->addColumn('fullname', function($station){
                return $station->contributor->fullname;
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
        $stations = Station::query();
        return $this->applyScopes($stations);
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
                    ->addAction(['width' => '155px'])
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
            ['data' => 'contributor.id', 'title' => trans('contributors.id'), 'visible' => false,],
            ['data' => 'fullname', 'title' => trans('contributors.full_name')],
            ['data' => 'code', 'title' => trans('stations.code'),],
            ['data' => 'name', 'title' => trans('stations.name'),],
            ['data' => 'position', 'title' => trans('stations.position')],
//            ['data' => 'msg', 'title' => trans('stations.log')],
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
