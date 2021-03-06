<?php

namespace App\DataTables;

use App\Models\KpiObjective;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KpiObjectiveDataTable extends DataTable
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
            ->addColumn('action', function(KpiObjective $kpiObjective) {
                return view('components.datatables.action', [
                    'actionRoutes' => [
                        'edit' => 'okr.kpi.objectives.edit',
                        'delete' => ''
                    ],
                    'itemSlug' => 'kpiObjective',
                    'itemSlugValue' => $kpiObjective->id
                ]);
            })->editColumn('objective_kpi', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'okr.kpi.objectives.show',
                    'showRouteSlug' => 'kpiObjective',
                    'showRouteSlugValue' => $request->id,
                    'columnData' => $request->objective_kpi
                ]);
            })->editColumn('result', function ($request) {
                return  $request->result 
                    ? Str::of($request->result)->limit(50) 
                    : __('label.global.text.na');
            })->editColumn('status', function ($request) {
                $status = Str::ucfirst(array_search($request->status, KpiObjective::COMPLETED_STATUS));
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

                $quarter = $this->request->filterQuarter;

                $instance->where('user_id', $user)
                    ->where('objective_year', $this->request->filterYear)
                    ->when(!empty($quarter), function ($query) use ($quarter) {
                        return $query->where('objective_quarter', $quarter);
                    });
            }, true)->rawColumns(['objective_kpi', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KpiObjective $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KpiObjective $model)
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
            ->setTableId('kpiobjective-table')
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
            Column::make('objective_kpi')
                ->title(__('label.kpi_objective.datatable.column_header.objective_kpi'))
                ->width('28%'),
            Column::make('target_date')
                ->title(__('label.kpi_objective.datatable.column_header.target_date'))
                ->width('15%'),
            Column::make('result')
                ->title(__('label.kpi_objective.datatable.column_header.result'))
                ->width('25%'),
            Column::make('status')
                ->title(__('label.kpi_objective.datatable.column_header.completed'))
                ->width('10%'),
            Column::make('updated_at')
                ->title(__('label.kpi_objective.datatable.column_header.updated_at'))
                ->width('12%'),
            Column::computed('action')
                ->title(__('label.kpi_objective.datatable.column_header.action'))
                ->width('10%')
        ];
    }
}
