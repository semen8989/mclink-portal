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
                'KPI MAIN GOAL',
                'Q1',
                'Q2',
                'Q3',
                'Q4',
                'FEEDBACK',
                'COMPLETED',
                'UPDATED AT'
            ];
        } elseif ($kpiType == 'variables') {
            $headerArray = [
                'KPI VARIABLE',
                'QUARTER',
                'YEAR',
                'TARGET DATE',
                'RESULT',
                'FEEDBACK',
                'COMPLETED',
                'UPDATED AT'
            ];
        }

        return $headerArray;
    }

    private function addRow(array $rowData = null)
    {
        array_push($this->output, $rowData ? $rowData : []);
    }
}