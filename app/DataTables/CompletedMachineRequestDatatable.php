<?php

namespace App\DataTables;

use App\Models\MachineRequest;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CompletedMachineRequestDatatable extends DataTable
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
            ->editColumn('id', function ($request) {
                return '#'.$request->id;
            })->editColumn('user.name', function ($request) {
                return $request->user->name;
            })->editColumn('company_name', function ($request) {
                return $request->company_name;
            })->editColumn('model', function ($request) {
                return $request->model;
            })->editColumn('qty', function ($request) {
                return $request->qty;
            })->editColumn('created_at', function ($request) {
                return $request->updated_at; // use moment.js for this later
            })->addColumn('detail', function(MachineRequest $machineRequest) {
                return view('components.datatables.detail', [
                    'editRouteName' => 'machine_request.completed',
                    'itemSlug' => 'machineRequest',
                    'itemSlugValue' => $machineRequest->id
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CompletedMachineRequestDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MachineRequest $model)
    {
        return $model->with('user')->select('machine_requests.*')->where('status','=',1);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->setTableId('completed-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->parameters([
            'order' => [
                0,
                'desc'
            ],
            'buttons' => [
                
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
            Column::make('id')
            ->title(__('label.machine_request.datatable.column_header.request_id')),
        Column::make('user.name')
            ->title(__('label.machine_request.datatable.column_header.request_by')),
        Column::make('company_name')
            ->title(__('label.machine_request.datatable.column_header.company_name')),
        Column::make('model')
            ->title(__('label.machine_request.datatable.column_header.model')),
        Column::make('qty')
            ->title(__('label.machine_request.datatable.column_header.quantity')),
        Column::make('updated_at')
            ->title(__('label.machine_request.datatable.column_header.updated_at')),
        Column::computed('detail')
            ->title(__('label.machine_request.datatable.column_header.details'))
        ];
    }

}
