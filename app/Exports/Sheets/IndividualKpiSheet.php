<?php

namespace App\Exports\Sheets;

use App\Models\User;
use App\Models\KpiMaingoal;
use App\Models\KpiVariable;
use Illuminate\Http\Request;
use App\Traits\KpiReportDataMappingTrait;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class IndividualKpiSheet implements FromCollection, WithMapping, WithTitle
{
    use KpiReportDataMappingTrait;
    
    private $user;
    private $kpiFilter;
    private $quarterFilter;
    private $yearFilter;

    public function __construct(Request $request, User $user)
    {
        $this->user = $user;
        $this->kpiFilter = $request->filterKpi;
        $this->quarterFilter = $request->filterQuarter;
        $this->yearFilter = $request->filterYear;
    }

    public function collection()
    {
        $quarter = $this->quarterFilter;

        $mainGoals = KpiMaingoal::where('user_id', $this->user->id)
            ->whereYear('created_at', $this->yearFilter)
            ->get();

        $variables = KpiVariable::where('user_id', $this->user->id)
            ->where('variable_year', $this->yearFilter)
            ->when(!empty($quarter), function ($query) use ($quarter) {
                return $query->where('variable_quarter', $quarter);
            })->get();

        $kpiData = collect();

        switch ($this->kpiFilter) {
            case 'mainGoals' :
                $kpiData->push(compact('mainGoals'));
                break;
            case 'variables' :
                $kpiData->push(compact('variables'));
                break;
            default :
                $kpiData->push(compact('mainGoals', 'variables'));
        }

        return $kpiData;
    }

    public function map($kpiData): array
    {        
        return $this->generateOutput($kpiData);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->user->name;
    }
}