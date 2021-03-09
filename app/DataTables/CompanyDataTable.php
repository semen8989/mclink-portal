<?php

namespace App\DataTables;

use App\Models\Company;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CompanyDataTable extends DataTable
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
            ->addColumn('action', function(Company $company) {
                return view('components.datatables.action', [
                    'editRouteName' => 'companies.edit',
                    'itemSlug' => 'company',
                    'itemSlugValue' => $company->id
                ]);
            })->editColumn('company_name', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'companies.show',
                    'showRouteSlug' => 'company',
                    'showRouteSlugValue' => $request->id,
                    'columnData' => $request->company_name
                ]);
            })->editColumn('email', function ($request) {
                return $request->email;
            })->editColumn('website', function ($request) {
                return $request->email;
            })->editColumn('city', function ($request) {
                return $request->city;
            })->editColumn('country', function ($request) {
                return $request->country;
            })->editColumn('user.name', function ($request) {
                return $request->user->name;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CompanyDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Company $model)
    {
        return $model->with('user')->select('companies.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('company-table')
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
                ->title(__('label.company_name')),
            Column::make('email')
                ->title(__('label.email')),
            Column::make('website')
                ->title(__('label.website')),
            Column::make('city')
                ->title(__('label.city')),
            Column::make('country')
                ->title(__('label.country')),
            Column::make('user.name')
                ->title(__('label.added_by')),
            Column::computed('action')
                ->title(__('label.action'))
        ];
    }

}
