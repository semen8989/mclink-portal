<?php

namespace App\DataTables;

use App\Models\KpiMaingoal;
use Illuminate\Support\Str;
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
            ->addIndexColumn()
            ->addColumn('action', function(KpiMaingoal $kpiMain) {
                return view('components.datatables.action', [
                    'actionRoutes' => [
                        'edit' => 'okr.kpi.maingoals.edit',
                        'delete' => ''
                    ],
                    'itemSlug' => 'kpiMain',
                    'itemSlugValue' => $kpiMain->id
                ]);
            })->editColumn('main_kpi', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'okr.kpi.maingoals.show',
                    'showRouteSlug' => 'kpiMain',
                    'showRouteSlugValue' => $request->id,
                    'columnData' => $request->main_kpi
                ]);
            })->editColumn('q1', function ($request) {
                return $request->q1 ?? 'N/A';
            })->editColumn('q2', function ($request) {
                return $request->q2 ?? 'N/A';
            })->editColumn('q3', function ($request) {
                return $request->q3 ?? 'N/A';
            })->editColumn('q4', function ($request) {
                return $request->q4 ?? 'N/A';
            })->editColumn('status', function ($request) {
                $status = Str::ucfirst(array_search($request->status, KpiMaingoal::COMPLETED_STATUS));
                $badgeColor = $status == 'Yes' ? 'success' : 'danger';

                return view('components.datatables.status-column', [
                    'columnData' => $status,
                    'badgeColor' => $badgeColor
                ]);
            })->editColumn('updated_at', function ($request) {
                return $request->updated_at->format('d/m/Y');
            })->filter(function ($instance) {
                $user = auth()->user()->isDepartmentHead() 
                    ? $this->request->filterEmployee
                    : auth()->user()->id;

                $instance->where('user_id', $user)
                    ->whereYear('created_at', $this->request->filterYear);
            }, true)->rawColumns(['main_kpi', 'status']);
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
            Column::make('main_kpi')
                ->title(__('label.kpi_main.datatable.column_header.main_kpi'))
                ->width('20%'),
            Column::make('q1')
                ->title(__('label.kpi_main.datatable.column_header.q1'))
                ->width('12%'),
            Column::make('q2')
                ->title(__('label.kpi_main.datatable.column_header.q2'))
                ->width('12%'),
            Column::make('q3')
                ->title(__('label.kpi_main.datatable.column_header.q3'))
                ->width('12%'),
            Column::make('q4')
                ->title(__('label.kpi_main.datatable.column_header.q4'))
                ->width('12%'),
            Column::make('status')
                ->title(__('label.kpi_main.datatable.column_header.completed'))
                ->width('10%'),
            Column::make('updated_at')
                ->title(__('label.kpi_main.datatable.column_header.updated_at'))
                ->width('12%'),
            Column::computed('action')
                ->title(__('label.kpi_main.datatable.column_header.action'))
                ->width('10%')
        ];
    }
}
