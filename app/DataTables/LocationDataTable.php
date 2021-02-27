<?php

namespace App\DataTables;

use App\Models\Location;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LocationDataTable extends DataTable
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
            ->addColumn('action', function(Location $location) {
                return view('components.datatables.action', [
                    'editRouteName' => 'locations.edit',
                    'itemSlug' => 'location',
                    'itemSlugValue' => $location->id
                ]);
            })->editColumn('location_name', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'locations.show',
                    'showRouteSlug' => 'location',
                    'showRouteSlugValue' => $request->id,
                    'columnData' => $request->location_name
                ]);
            })->editColumn('company.company_name', function ($request) {
                return $request->company->company_name;
            })->editColumn('user.name', function ($request) {
                return $request->user->where('id',$request->user_id)->first()->name;
            })->editColumn('city', function ($request) {
                return $request->city;
            })->editColumn('country', function ($request) {
                return $request->country;
            })->editColumn('user.name', function ($request) {
                return $request->user->where('id',$request->added_by)->first()->name;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Location $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Location $model)
    {
        return $model->with('company','user')->select('locations.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('location-table')
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
            Column::make('location_name')
                ->title(__('label.location_name')),
            Column::make('user.name')
                ->title(__('label.location_head')),
            Column::make('city')
                ->title(__('label.city')),
            Column::make('country')
                ->title(__('label.country')),
            Column::make('user.name')
                ->title(__('label.added_by')),
            Column::computed('action')
                ->title(__('label.action')),
        ];
    }

}
