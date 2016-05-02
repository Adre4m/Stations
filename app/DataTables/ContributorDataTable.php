<?php

namespace App\DataTables;

use App\Models\Contributor;
use Yajra\Datatables\Services\DataTable;

class ContributorDataTable extends DataTable
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
            ->addColumn("action", function ($contributor){
                return view('contributors.actions')->with('contributor', $contributor);
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
        return $this->applyScopes(Contributor::query());
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
            ['data' => 'code', 'title' => trans('contributors.code')],
            ['data' => 'name', 'title' => trans('contributors.name'),],
            ['data' => 'last_name', 'title' => trans('contributors.last_name'),],
            ['data' => 'siret', 'title' => trans('contributors.siret'),],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'contributors';
    }
}
