<?php

namespace App\DataTables;

use Illuminate\Support\Str;
use App\Models\ServiceReport;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ServiceReportDataTable extends DataTable
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
            ->setRowId('csr_no')
            ->addColumn('action', function(ServiceReport $serviceReport) {
                return view('components.datatables.action', [
                    'editRouteName' => 'service.form.edit',
                    'editRouteSlug' => 'serviceReport',
                    'editRouteSlugValue' => $serviceReport->csr_no
                ]);
            })
            ->editColumn('csr_no', function ($request) {
                return '<a href="' . route('service.form.show', ['serviceReport' => $request->csr_no]) .
                    '">' . $request->csr_no . '</a>';
            })
            ->editColumn('service_start', function ($request) {
                return $request->created_at->format('d/m/Y');
            })
            ->editColumn('status', function ($request) {
                $status = Str::ucfirst(array_search($request->status, ServiceReport::STATUS));
                $badgeType = $status != 'Draft' ? 'success' : 'primary';

                return '<span class="badge badge-' . $badgeType .
                    ' px-2 py-1">' . $status . '</span>';
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
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')
                    );
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

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ServiceReport_' . date('YmdHis');
    }
}
