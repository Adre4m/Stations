<?php

namespace App\DataTables;

use App\Models\Network;
use App\Models\Station;
use App\Models\StationNetwork;
use App\User;
use Yajra\Datatables\Services\DataTable;

class StationNetworkDataTable extends DataTable
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
            ->addColumn("action", function ($station_network){
                return view('station_networks.actions')->with('station_network', $station_network);
            })
            ->addColumn('station', function($station_network) {
                return $station_network->station->code;
            })
            ->addColumn('network', function($station_network) {
                return $station_network->network->code;
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
        return $this->applyScopes(StationNetwork::query());
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
            ['data' => 'station_id', 'visible' => false],
            ['data' => 'network_id', 'visible' => false],
            ['data' => 'began_at', 'title' => trans('station_networks.began_at')],
            ['data' => 'end_at', 'title' => trans('station_networks.end_at')],
            ['data' => 'station', 'title' => trans('station_networks.station')],
            ['data' => 'network', 'title' => trans('station_networks.network')],
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
