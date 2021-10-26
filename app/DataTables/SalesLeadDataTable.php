<?php

namespace App\DataTables;

use App\Models\SalesLead;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SalesLeadDataTable extends DataTable
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
            ->editColumn('company_name', function ($request) {
                return $request->company_name;
            })->editColumn('assigned_sales', function ($request) {
                return $request->assigned_sales;
            })->editColumn('salesManagerUser.name', function ($request) {
                return $request->salesManagerUser->name;
            })->editColumn('status', function ($request) {
                return $request->status;
            })->editColumn('is_approved', function ($request) {
                return $request->is_approved;
            })->editColumn('created_at', function ($request) {
                return $request->created_at->format('M d Y');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SalesLead $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SalesLead $model)
    {
        return $model->with('salesManagerUser')->select('sales_leads.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('sales-lead-table')
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
            Column::make('company_name')
                ->title('Company Name'),
            Column::make('assigned_sales')
                ->title('Assigned Sales'),
            Column::make('salesManagerUser.name')
                ->title('Sales Manager'),
            Column::make('status')
                ->title('Status'),
            Column::make('is_approved')
                ->title('Approved'),
            Column::make('created_at')
                ->title('Created At')
        ];
    }
}
