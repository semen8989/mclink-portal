<?php

namespace App\DataTables;

use App\Models\EmployeeAppraisal;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MyRecordAppraisalDataTable extends DataTable
{
    /**
     * Get the employee specific data base on the employee type and data type.
     *
     * @param string $employeeType
     * @param string $dataType
     * @return string
     */
    public function getEmployeeData($employeeType, $dataType)
    {
        if ($employeeType == 'new-employees') {
            $employee = EmployeeAppraisal::NEW_EMPLOYEE;
        } elseif ($employeeType == 'regular-employees') {
            $employee = EmployeeAppraisal::REGULAR_EMPLOYEE;
        }

        return $employee[$dataType];
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        // EmployeeAppraisal $employeeAppraisal;
        $employeeSegment = last(request()->segments());

        $employeeParam = $this->getEmployeeData($employeeSegment, 'param');
        $employeeRoute = $this->getEmployeeData($employeeSegment, 'route');
        $employeeRelationship = $this->getEmployeeData($employeeSegment, 'relationship');

        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(EmployeeAppraisal $appraisal) use ($employeeRoute, $employeeParam) {
                return view('components.datatables.action', [
                    'actionRoutes' => [
                        'edit' => $employeeRoute . '.edit',
                        'delete' => ''
                    ],
                    'itemSlug' => $employeeParam,
                    'itemSlugValue' => $appraisal->id
                ]);
            })->editColumn('employee.name', function ($request) use ($employeeRoute, $employeeParam) {
                return view('components.datatables.show-column', [
                    'showRouteName' => $employeeRoute . '.show',
                    'showRouteSlug' => $employeeParam,
                    'showRouteSlugValue' => $request->id,
                    'columnData' => $request->employee->name
                ]);
            })->editColumn('employee.avatar', function ($request) {
                return view('components.datatables.image-column', [
                    'imageLink' => $request->employee->avatar
                ]);
            })->editColumn('review_period_from', function ($request) {
                return $request->review_period_from->format('d/m/Y');
            })->editColumn('review_period_to', function ($request) {
                return $request->review_period_to->format('d/m/Y');
            })->editColumn('review_date', function ($request) {
                return $request->review_date->format('d/m/Y');
            })->editColumn('updated_at', function ($request) {
                return $request->updated_at->format('d/m/Y');
            })->filter(function ($instance) use ($employeeRelationship) {
                $instance->has($employeeRelationship);
            }, true);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\EmployeeAppraisal $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EmployeeAppraisal $model)
    {
        return $model->with('employee:id,name,avatar')->select('employee_appraisals.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('myrecordappraisal-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'autoWidth' => false,
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
                'responsive' => true
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
            Column::make('employee.name')
                ->title(__('label.e_appraisal_my_record.datatable.column_header.name'))
                ->width('16%'),
            Column::make('employee.avatar')
                ->title(__('label.e_appraisal_my_record.datatable.column_header.avatar'))
                ->width('12%'),
            Column::make('review_period_from')
                ->title(__('label.e_appraisal_my_record.datatable.column_header.review_period_from'))
                ->width('14%'),
            Column::make('review_period_to')
                ->title(__('label.e_appraisal_my_record.datatable.column_header.review_period_to'))
                ->width('14%'),
            Column::make('review_date')
                ->title(__('label.e_appraisal_my_record.datatable.column_header.review_date'))
                ->width('10%'),
            Column::make('total_score')
                ->title(__('label.e_appraisal_my_record.datatable.column_header.total_score'))
                ->width('10%'),
            Column::make('updated_at')
                ->title(__('label.e_appraisal_my_record.datatable.column_header.updated_at'))
                ->width('11%'),
            Column::computed('action')
                ->title(__('label.e_appraisal_my_record.datatable.column_header.action'))
                ->width('10%')
        ];
    }
}
