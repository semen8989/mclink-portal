<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Models\KpiMaingoal;
use App\Models\KpiVariable;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Shared\Date;

trait KpiReportDataMappingTrait {

    private $output = [];
    
    public function generateOutput(Array $kpiData)
    {      
        foreach ($kpiData as $kpiType => $kpiVal) {

            $this->addRow($this->getHeaderArray($kpiType));

            switch ($kpiType) {
                case 'mainGoals':
                    foreach ($kpiVal as $kpiItem) { 
                        $this->addRow([
                            $kpiItem->main_kpi,
                            $kpiItem->q1,
                            $kpiItem->q2,
                            $kpiItem->q3,
                            $kpiItem->q4,
                            $kpiItem->feedback,
                            Str::ucfirst(array_search($kpiItem->status, KpiMaingoal::COMPLETED_STATUS)),
                            $kpiItem->updated_at->format('d/m/Y'),
                        ]);
                    } 

                    break;

                case 'variables': 
                    foreach ($kpiVal as $kpiItem) {
                        $this->addRow([
                            $kpiItem->variable_kpi,
                            KpiVariable::QUARTER[$kpiItem->variable_quarter],
                            $kpiItem->variable_year,
                            $kpiItem->target_date->format('d/m/Y'),
                            $kpiItem->result,
                            $kpiItem->feedback,
                            Str::ucfirst(array_search($kpiItem->status, KpiVariable::COMPLETED_STATUS)),
                            $kpiItem->updated_at->format('d/m/Y'),
                        ]);
                    }

                    break;  

            } 

            $this->addRow();
        }
        
        return $this->output;
    }

    private function getHeaderArray(string $kpiType)
    {
        $headerArray = [];

        if ($kpiType == 'mainGoals') {
            $headerArray = [
                Str::upper(__('label.kpi_main.datatable.column_header.main_kpi')),
                Str::upper(__('label.kpi_main.datatable.column_header.q1')),
                Str::upper(__('label.kpi_main.datatable.column_header.q2')),
                Str::upper(__('label.kpi_main.datatable.column_header.q3')),
                Str::upper(__('label.kpi_main.datatable.column_header.q4')),
                Str::upper(__('label.kpi_main.datatable.column_header.feedback')),
                Str::upper(__('label.kpi_main.datatable.column_header.completed')),
                Str::upper(__('label.kpi_main.datatable.column_header.updated_at'))
            ];
        } elseif ($kpiType == 'variables') {
            $headerArray = [
                Str::upper(__('label.kpi_variable.datatable.column_header.variable_kpi')),
                Str::upper(__('label.kpi_variable.datatable.column_header.quarter')),
                Str::upper(__('label.kpi_variable.datatable.column_header.year')),
                Str::upper(__('label.kpi_variable.datatable.column_header.target_date')),
                Str::upper(__('label.kpi_variable.datatable.column_header.result')),
                Str::upper(__('label.kpi_variable.datatable.column_header.feedback')),
                Str::upper(__('label.kpi_variable.datatable.column_header.completed')),
                Str::upper(__('label.kpi_variable.datatable.column_header.updated_at'))
            ];
        }

        return $headerArray;
    }

    private function addRow(array $rowData = null)
    {
        array_push($this->output, $rowData ? $rowData : []);
    }
}