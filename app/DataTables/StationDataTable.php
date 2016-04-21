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
            ->addColumn("action", function($station) {
                return '<a href="/edit' . $station->code . '">
                            <button class="btn btn-warning" type="button"><i class="fa fa-btn fa-edit"></i>' .
                trans('stations.edit').
                '</button>
                        </a>
                        <a href="/destroy' . $station->code . '">
                            <button class="btn btn-danger" type="button"><i class="fa fa-btn fa-trash"></i>'.
                trans('stations.destroy').
                '</button>
                        </a>';
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
            ['data' => 'name', 'title' => trans('stations.name')],
            ['data' => 'x', 'title' => trans('stations.x')],
            ['data' => 'y', 'title' => trans('stations.y')],
            ['data' => 'msg', 'title' => trans('stations.log')],
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
