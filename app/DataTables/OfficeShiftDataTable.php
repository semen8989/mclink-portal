<?php

namespace App\DataTables;

use App\Models\OfficeShift;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OfficeShiftDataTable extends DataTable
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
            ->addColumn('action', function(OfficeShift $officeShift) {
                return view('components.datatables.action', [
                    'actionRoutes' => [
                        'edit' => 'office-shifts.edit',
                        'delete' => ''
                    ],
                    'itemSlug' => 'office_shift',
                    'itemSlugValue' => $officeShift->id
                ]);
            })->editColumn('shift_name', function ($request) {
                return $request->shift_name;
            })->editColumn('company.company_name', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'office-shifts.show',
                    'showRouteSlug' => 'office_shift',
                    'showRouteSlugValue' => $request->id,
                    'columnData' => $request->company->company_name
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OfficeShift $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OfficeShift $model)
    {
        return $model->with('company')->select('office_shifts.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('office-shift-table')
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
            Column::make('company.company_name')
                ->title(__('label.company_name')),
            Column::make('shift_name')
                ->title(__('label.day')),
            Column::computed('action')
                ->title(__('label.action')),
        ];
    }

}
