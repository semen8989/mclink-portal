<?php

namespace App\DataTables;

use Illuminate\Support\Str;
use App\Models\ServiceReport;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ServiceReportDataTable extends DataTable
{
    protected $actions = ['create'];

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
            ->setRowId('csr_no')
            ->addColumn('action', function(ServiceReport $serviceReport) {
                return view('components.datatables.action', [
                    'editRouteName' => 'service.form.edit',
                    'editRouteSlug' => 'serviceReport',
                    'editRouteSlugValue' => $serviceReport->csr_no
                ]);
            })
            ->editColumn('csr_no', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'service.form.show',
                    'showRouteSlug' => 'serviceReport',
                    'showRouteSlugValue' => $request->csr_no,
                    'columnData' => $request->csr_no
                ]);
            })
            ->editColumn('service_start', function ($request) {
                return $request->created_at->format('d/m/Y');
            })
            ->editColumn('status', function ($request) {
                $status = Str::ucfirst(array_search($request->status, ServiceReport::STATUS));
                $badgeColor = $status != 'Draft' ? 'success' : 'primary';

                return view('components.datatables.status-column', [
                    'columnData' => $status,
                    'badgeColor' => $badgeColor
                ]);
            })
            ->rawColumns(['csr_no', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ServiceReport $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceReport $model)
    {
        return $model->newQuery()->with(['customer:id,name']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('servicereport-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'buttons' => [
                    'create'
                ],
                'language' => [
                    'search' => '',
                    'searchPlaceholder' => 'Search',
                    'loadingRecords' => '&nbsp;',
                    'processing' => '<div class="spinner"></div>'
                ]
            ])->dom("<'row mb-2'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" .
                "<'row'<'col-sm-12 col-md-12't><'col-sm-12 col-md-12'r>>" .
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
            Column::make('csr_no')
                ->title('CSR No.'),
            Column::make('customer.name')
                ->title('Customer Name'),
            Column::make('service_start'),
            Column::make('status'),
            Column::computed('action')
                ->addClass('text-center'),
        ];
    }
}
