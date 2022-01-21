<?php

namespace App\DataTables;

use App\Models\Ability;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AbilityDataTable extends DataTable
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
        ->addColumn('action', function(Ability $ability) {
            return view('components.datatables.action', [
                'actionRoutes' => [
                    'edit' => 'abilities.edit',
                    'delete' => ''
                ],
                'itemSlug' => 'ability',
                'itemSlugValue' => $ability->id
            ]);
        })->editColumn('name', function ($request) {
            return $request->name;
        })->editColumn('label', function ($request) {
            if($request->label == null){
                return '---';
            }else{
                return $request->label;
            }
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ability $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ability $model)
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
            ->setTableId('ability-table')
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
            Column::make('name')
                ->title('Ability Name'),
            Column::make('label')
                ->title('Label'),
            Column::computed('action')
                ->title(__('label.action'))
        ];
    }

}
