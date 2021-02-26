<?php

namespace App\DataTables;

use App\Models\Expense;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ExpenseDataTable extends DataTable
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
            ->addColumn('action', function(Expense $expense) {
                return view('components.datatables.action', [
                    'editRouteName' => 'expenses.edit',
                    'itemSlug' => 'expense',
                    'itemSlugValue' => $expense->id
                ]);
            })->editColumn('user.name', function ($request) {
                return $request->user->name;
            })->editColumn('company.company_name', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'expenses.show',
                    'showRouteSlug' => 'expense',
                    'showRouteSlugValue' => $request->id,
                    'columnData' => $request->company->company_name
                ]);
            })->editColumn('expense_type.id', function ($request) {
                return $request->expense_type->expense_type;
            })->editColumn('amount', function ($request) {
                return $request->amount;
            })->editColumn('purchase_date', function ($request) {
                return date('M d Y', strtotime($request->purchase_date));
            })->editColumn('status', function ($request) {
                return $request->status;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Expense $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Expense $model)
    {
        return $model->newQuery()->with(['company:id,company_name','user:id,name','expense_type:id,expense_type']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('expense-table')
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
            ->title(__('label.company')),
            Column::make('user.name')
                ->title(__('label.employee')),
            Column::make('expense_type.id')
                ->title(__('label.expenses')),
            Column::make('amount')
                ->title(__('label.amount')),
            Column::make('purchase_date')
                ->title(__('label.purchase_date')),
            Column::make('status')
                ->title(__('label.status')),
            Column::computed('action')
                ->title(__('label.action')),
        ];
    }

}
