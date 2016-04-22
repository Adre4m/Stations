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
            ->addColumn("action", function($contributor) {
                return '<a href="/contributors/edit' . $contributor->id . '">
                            <button class="btn btn-warning" type="button"><i class="fa fa-btn fa-edit"></i>' .
                trans('contributors.edit').
                '</button>
                        </a>
                        <a href="/contributors/destroy' . $contributor->id . '">
                            <button class="btn btn-danger" type="button"><i class="fa fa-btn fa-trash"></i>'.
                trans('contributors.destroy').
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
        $contributors = Contributor::query();
        return $this->applyScopes($contributors);
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
            ['data' => 'id', 'title' => trans('contributors.id'), 'visible' => false],
            ['data' => 'name', 'title' => trans('contributors.name')],
            ['data' => 'last_name', 'title' => trans('contributors.last_name')],
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