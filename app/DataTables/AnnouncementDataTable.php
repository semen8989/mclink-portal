<?php

namespace App\DataTables;

use App\Models\Announcement;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AnnouncementDataTable extends DataTable
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
            ->addColumn('action', function(Announcement $announcement) {
                return view('components.datatables.action', [
                    'actionRoutes' => [
                        'edit' => 'announcements.edit',
                        'delete' => ''
                    ],
                    'itemSlug' => 'announcement',
                    'itemSlugValue' => $announcement->id
                ]);
            })->editColumn('title', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'announcements.show',
                    'showRouteSlug' => 'announcement',
                    'showRouteSlugValue' => $request->id,
                    'columnData' => $request->title
                ]);
            })->editColumn('company.company_name', function ($request) {
                return $request->company->company_name;
            })->editColumn('summary', function ($request) {
                return $request->summary;
            })->editColumn('department.department_name', function ($request) {
                return $request->department->department_name;
            })->editColumn('start_date', function ($request) {
                return $request->start_date;
            })->editColumn('end_date', function ($request) {
                return $request->end_date;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Announcement $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Announcement $model)
    {
        return $model->with('company','department')->select('announcements.*');
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
            Column::make('title')
                ->title(__('label.title')),
            Column::make('company.company_name')
                ->title(__('label.company')),
            Column::make('summary')
                ->title(__('label.summary')),
            Column::make('department.department_name')
                ->title(__('label.published_for')),
            Column::make('start_date')
                ->title(__('label.start_date')),
            Column::make('end_date')
                ->title(__('label.end_date')),
            Column::computed('action')
                ->title(__('label.action'))
        ];
    }

}
