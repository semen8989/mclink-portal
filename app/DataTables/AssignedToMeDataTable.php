<?php

namespace App\DataTables;

use App\Models\SalesLead;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AssignedToMeDataTable extends DataTable
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
            ->editColumn('createdByUser.name', function ($request) {
                return $request->createdByUser->name;
            })->editColumn('salesManagerUser.name', function ($request) {
                return $request->salesManagerUser->name;
            })->editColumn('company_name', function ($request) {
                return $request->company_name;
            })->editColumn('status', function ($request) {
                $status = Str::ucfirst(array_search($request->status, SalesLead::STATUS));

                if($request->status == 1){
                    $badgeColor = 'warning';
                }else if($request->status == 2){
                    $badgeColor = 'danger';
                }else if($request->status == 3){
                    $badgeColor = 'success';
                }

                return view('components.datatables.status-column', [
                    'columnData' => $status,
                    'badgeColor' => $badgeColor
                ]);

            })->editColumn('created_at', function ($request) {
                return date('F j, Y',strtotime($request->created_at));
            })->editColumn('valid_until', function ($request) {
                return date('F j, Y',strtotime($request->valid_until));
            })->addColumn('detail', function(SalesLead $salesLead) {
                return view('components.datatables.detail', [
                    'editRouteName' => 'sales_lead.lead_details',
                    'itemSlug' => 'salesLead',
                    'itemSlugValue' => $salesLead->id
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AssignToMe $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SalesLead $model)
    {
        return $model->with('createdByUser','salesManagerUser')->select('sales_leads.*')->where('assigned_sales',auth()->user()->id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->setTableId('assign-sales-lead-table')
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
            Column::make('createdByUser.name')
                ->title('Created By'),
            Column::make('salesManagerUser.name')
                ->title('Assigned to you by'),
            Column::make('company_name')
                ->title('Company Name'),
            Column::make('status')
                ->title('Status'),
            Column::make('created_at')
                ->title('Created At'),
            Column::make('valid_until')
                ->title('Valid Until'),
            Column::computed('detail')
                ->title('Action')
        ];
    }
}
