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
                    'editRouteName' => 'designation.edit',
                    'itemSlug' => 'designation',
                    'itemSlugValue' => $designation->id
                ]);
            })->editColumn('designation_name', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'designation.show',
                    'showRouteSlug' => 'designation',
                    'showRouteSlugValue' => $designation->id,
                    'columnData' => $designation->designation_name
                ]);
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
                            'searchPlaceholder' => 'search',
                            'loadingRecords' => '&nbsp;',
                            'processing' => '<div class="text-center"><div class="spinner-border" role="status">
                                <span class="sr-only">loading</span></div></div>'
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
            Column::make('company')
                ->title(__('label.company')),
            Column::make('department')
                ->title(__('label.department')),
            Column::computed('action')
                ->title(__('label.action'))
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Designation_' . date('YmdHis');
    }
}
