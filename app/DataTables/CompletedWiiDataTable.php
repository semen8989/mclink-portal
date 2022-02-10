<?php

namespace App\DataTables;

use App\Models\Wii;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CompletedWiiDataTable extends DataTable
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
            ->editColumn('id', function ($request) {
                return '#'.$request->id;
            })->editColumn('purpose', function ($request) {
                return view('components.datatables.show-column', [
                    'showRouteName' => 'wii.show',
                    'showRouteSlug' => 'wii',
                    'showRouteSlugValue' => $request->id,
                    'columnData' => $request->purpose
                ]);
            })->editColumn('status', function ($request) {
                $status = ucwords(array_search($request->status, Wii::STATUS));
                $index = $request->status;

                if($index == 0){
                    $badgeColor = 'dark';
                }else if($index == 1){
                    $badgeColor = 'success';
                }else if($index == 2){
                    $badgeColor = 'danger';
                }else if($index == 3){
                    $badgeColor = 'warning';
                }

                return view('components.datatables.status-column', [
                        'columnData' => $status,
                        'badgeColor' => $badgeColor
                ]);

            })->editColumn('remarks', function ($request) {
                if($request->remarks != null){
                    return $request->remarks;
                }else{
                    return 'No Remarks Available';
                }
            })->editColumn('created_at', function ($request) {
                return $request->created_at->format('F j, Y');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CompletedWii $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Wii $model)
    {
        return $model->with('user')
                    ->select('wii.*')
                    ->where('user_id',auth()->user()->id)
                    ->where(function($query){
                        $query->where('status',1);
                        $query->orWhere('status',2);
                    });
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->setTableId('completed-wii-table')
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
            Column::make('id')
                ->title('#'),
            Column::make('purpose')
                ->title('Purpose'),
            Column::make('status')
                ->title('Status'),
            Column::make('remarks')
                ->title('Remarks'),
            Column::make('created_at')
                ->title('Date Submitted')
        ];
    }
}
