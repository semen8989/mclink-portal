<?php

namespace App\DataTables;

use App\Models\KpiMaingoal;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KpiMaingoalDataTable extends DataTable
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
            ->setRowId('id')
            ->addColumn('action', function(KpiMaingoal $kpiMain) {
                return view('components.datatables.action', [
                    'actionRoutes' => [
                        'show' => 'performance.okr.kpi-maingoals.show',
                        'edit' => 'performance.okr.kpi-maingoals.edit',
                        'delete' => ''
                    ],
                    'itemSlug' => 'kpiMain',
                    'itemSlugValue' => $kpiMain->id
                ]);
            })->editColumn('status', function ($request) {
                return Str::ucfirst(array_search($request->status, KpiMaingoal::COMPLETED_STATUS));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KpiMaingoal $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KpiMaingoal $model)
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
            ->setTableId('kpimain-table')
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
            Column::computed('action')
                ->title(__('label.kpi_main.datatable.column_header.action')),
            Column::make('main_kpi')
                ->title(__('label.kpi_main.datatable.column_header.main_kpi')),
            Column::make('q1')
                ->title(__('label.kpi_main.datatable.column_header.q1')),
            Column::make('q2')
                ->title(__('label.kpi_main.datatable.column_header.q2')),
            Column::make('q3')
                ->title(__('label.kpi_main.datatable.column_header.q3')),
            Column::make('q4')
                ->title(__('label.kpi_main.datatable.column_header.q4')),
            Column::make('status')
                ->title(__('label.kpi_main.datatable.column_header.completed')),
        ];
    }
}
