<?php

namespace App\DataTables;

use App\Models\Designation;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DesignationDataTable extends DataTable
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
            ->addColumn('action', function(Designation $designation) {
                return view('components.datatables.action', [
                    'editRouteName' => 'designations.edit',
                    'itemSlug' => 'designation',
                    'itemSlugValue' => $designation->id
                ]);
            })->editColumn('designation', function ($request) {
                return $request->designation_name;
            })->editColumn('company.company_name', function ($request) {
                return $request->company->company_name;
            })->editColumn('department.department_name', function ($request) {
                return $request->department->department_name;
            });
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Designation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Designation $model)
    {
        return $model->with('company','department')->select('designations.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('designation-table')
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
            Column::make('designation_name')
                ->title(__('label.designation_name')),
            Column::make('company.company_name')
                ->title(__('label.company')),
            Column::make('department.department_name')
                ->title(__('label.department')),
            Column::computed('action')
                ->title(__('label.action'))
        ];
    }
}
