<?php

namespace App\DataTables;

use App\Models\KpiVariable;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KpiVariableDataTable extends DataTable
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
            ->addIndexColumn()
            ->addColumn('', function(KpiVariable $kpiVariable) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'okr.kpi.variables.show',
                    'showRouteSlug' => 'kpiVariable',
                    'showRouteSlugValue' => $kpiVariable->id
                ]);
            })->addColumn('action', function(KpiVariable $kpiVariable) {
                return view('components.datatables.action', [
                    'actionRoutes' => [
                        'edit' => 'okr.kpi.variables.edit',
                        'delete' => ''
                    ],
                    'itemSlug' => 'kpiVariable',
                    'itemSlugValue' => $kpiVariable->id
                ]);
            })->editColumn('result', function ($request) {
                return $request->result ?? __('label.global.text.na');
            })->editColumn('status', function ($request) {
                $status = Str::ucfirst(array_search($request->status, KpiVariable::COMPLETED_STATUS));
                $badgeColor = $status == 'Yes' ? 'success' : 'danger';

                return view('components.datatables.status-column', [
                    'columnData' => $status,
                    'badgeColor' => $badgeColor
                ]);
            })->filter(function ($instance) {
                $user = auth()->user()->isDepartmentHead() 
                    ? $this->request->filterEmployee
                    : auth()->user()->id;

                $instance->where('user_id', $user)
                    ->whereYear('created_at', $this->request->filterYear);
            }, true)->rawColumns(['status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KpiVariableDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KpiVariable $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('kpivariable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'autoWidth' => false,
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
                'responsive' => true
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
            Column::computed('')
                ->width('5%'),
            Column::make('variable_kpi')
                ->title(__('label.kpi_variable.datatable.column_header.variable_kpi'))
                ->width('30%'),
            Column::make('target_date')
                ->title(__('label.kpi_variable.datatable.column_header.target_date'))
                ->width('15%'),
            Column::make('result')
                ->title(__('label.kpi_variable.datatable.column_header.result'))
                ->width('30%'),
            Column::make('status')
                ->title(__('label.kpi_variable.datatable.column_header.completed'))
                ->width('10%'),
            Column::computed('action')
                ->title(__('label.kpi_variable.datatable.column_header.action'))
                ->width('10%')
        ];
    }
}
