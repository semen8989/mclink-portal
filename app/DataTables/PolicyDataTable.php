<?php

namespace App\DataTables;

use App\Models\Policy;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PolicyDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function(Policy $policy) {
                return view('components.datatables.action', [
                    'actionRoutes' => [
                        'edit' => 'policies.edit',
                        'delete' => ''
                    ],
                    'itemSlug' => 'policy',
                    'itemSlugValue' => $policy->id
                ]);
            })->editColumn('title', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'policies.show',
                    'showRouteSlug' => 'policy',
                    'showRouteSlugValue' => $request->id,
                    'columnData' => $request->title
                ]);
            })->editColumn('company.company_name', function ($request) {
                return ($request->company_id != 0) ? $request->company->company_name : __('label.all_companies');
            })->editColumn('created_at', function ($request) {
                return $request->created_at->format('M d Y');
            })->editColumn('user.name', function ($request) {
                return $request->user->name;
            });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Policy $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Policy $model)
    {
        return $model->with('company','user')->select('policies.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('policy-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'order' => [
                    0,
                    'desc'
                ],
                'buttons' => [
                    'create'
                ],
                'language' => [
                    'search' => '',
                    'searchPlaceholder' => __('label.global.datatable.text.search_placeholder'),
                    'loadingRecords' => '&nbsp;',
                    'processing' => '<div class="text-center"><div class="spinner-border" role="status">
                        <span class="sr-only">' . __('label.global.datatable.text.loading') . '</span></div></div>'
                ],
                'responsive' => true,
                'drawCallback' => "function (settings, json) {" .
                    "$('.copy-btn').tooltip();}"
            ])->dom("<'row mb-2'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" .
                "<'row'<'col-sm-12 col-md-12 table-responsive't><'col-sm-12 col-md-12'r>>" .
                "<'row'<'col-sm-12 col-md-6'p>>"
            )->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('title')
                ->title(__('label.title')),
            Column::make('company.company_name')
                ->title(__('label.company')),
            Column::make('created_at')
                ->title(__('label.created_at')),
            Column::make('user.name')
            ->title(__('label.added_by')),
            Column::computed('action')
                ->title(__('label.action')),
        ];
    }

}
