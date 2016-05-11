<?php

namespace App\DataTables;

use App\Models\Network;
use App\Models\Station;
use App\Models\NetworkStation;
use App\User;
use Yajra\Datatables\Services\DataTable;

class NetworkStationDataTable extends DataTable
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
            ->addColumn("action", function ($network_station){
                return view('network_station.actions')->with('network_station', $network_station);
            })
            ->addColumn('station', function($network_station) {
                return $network_station->station->code;
            })
            ->addColumn('network', function($network_station) {
                return $network_station->network->code;
            })
            ->addColumn('begin', function($network_station) {
                return $network_station->begin;
            })
            ->addColumn('end', function($network_station) {
                return $network_station->end;
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
        return $this->applyScopes(NetworkStation::query());
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
            ['data' => 'begin', 'title' => trans('network_station.began_at'),],
            ['data' => 'end', 'title' => trans('network_station.end_at'),],
            ['data' => 'station', 'title' => trans('network_station.station')],
            ['data' => 'network', 'title' => trans('network_station.network'),],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'networks';
    }
}
