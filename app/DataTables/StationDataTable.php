<?php

namespace App\DataTables;

use App\Models\Station;
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
            ->addColumn("action", function ($station) {
                return view('stations.actions')->with('station', $station);
            })
            ->addColumn('manager', function ($station) {
                return "{$station->manager->fullname}";
            })
            ->addColumn('owner', function ($station) {
                return "{$station->owner->fullname}";
            })
            ->addColumn('position', function ($station) {
                return $station->position;
            })
            ->editColumn('code', function ($station) {
                return "<a href=\"" . route('stations.show', $station) . "\">{$station->code}</a>";
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
            ['data' => 'code', 'title' => trans('stations.code'),],
            ['data' => 'name', 'title' => trans('stations.name'),],
            ['data' => 'position', 'title' => trans('stations.position')],
            ['data' => 'manager', 'title' => trans('contributors.manager')],
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
