<?php

namespace App\Exports;

use Illuminate\Http\Request;
use App\Exports\Sheets\IndividualKpiSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EmployeeKpiExport implements Responsable, WithMultipleSheets
{
    use Exportable;
    
    private $fileName = 'kpi_report.xlsx';
    private $users;
    private $request;

    public function __construct(Request $request, Collection $users)
    {
        $this->users = $users;
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->users as $user) {
            $sheets[] = new IndividualKpiSheet($this->request, $user);
        }

        return $sheets;
    }
}