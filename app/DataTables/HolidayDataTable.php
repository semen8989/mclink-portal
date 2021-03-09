<?php

namespace App\DataTables;

use App\Models\Holiday;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HolidayDataTable extends DataTable
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
            ->addColumn('action', function(Holiday $holiday) {
                return view('components.datatables.action', [
                    'editRouteName' => 'holidays.edit',
                    'itemSlug' => 'holiday',
                    'itemSlugValue' => $holiday->id
                ]);
            })->editColumn('company.company_name', function ($request) {
                return $request->company->company_name;
            })->editColumn('event_name', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'holidays.show',
                    'showRouteSlug' => 'holiday',
                    'showRouteSlugValue' => $request->id,
                    'columnData' => $request->event_name
                ]);
            })->editColumn('status', function ($request) {
                return ucfirst($request->status);
            })->editColumn('start_date', function ($request) {
                return date('M d Y', strtotime($request->start_date));
            })->editColumn('end_date', function ($request) {
                return date('M d Y', strtotime($request->end_date));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Holiday $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Holiday $model)
    {
        return $model->with('company')->select('holidays.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('holiday-table')
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
            Column::make('event_name')
                ->title(__('label.event_name')),
            Column::make('company.company_name')
                ->title(__('label.company')),
            Column::make('status')
                ->title(__('label.status')),
            Column::make('start_date')
            ->title(__('label.start_date')),
            Column::make('end_date')
            ->title(__('label.end_date')),
            Column::computed('action')
                ->title(__('label.action')),
        ];
    }

}
