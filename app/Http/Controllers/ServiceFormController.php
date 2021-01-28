<?php

namespace App\Http\Controllers;

use App\Models\ServiceReport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceFormController extends Controller
{
    /**
     * Show list of service forms.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('service_form.index', [
        ]);
    }

    /**
     * Show the form for creating a new service form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentDate = Carbon::now()->format('Ymd');

        $recentServiceReport = ServiceReport::select('csr_no')
            ->where('date', $currentDate)
            ->orderByDesc('created_at')
            ->first();

        $runningNum = 1;
             
        if ($recentServiceReport) {
            $csrNo = $recentServiceReport->csr_no;

            $numIndex = strrpos($csrNo, '-') + 1;
            $runningNum = substr($csrNo, $numIndex);
        }
        
        $fullCsrNo = $currentDate . '-' . $runningNum;
        
        return view('service_form.create', ['csrNo' => $fullCsrNo]);
    }


    public function store(Request $request)
    {
        switch ($request->input('action')) {
            case 'save':
                // Save model
                break;
    
            case 'preview':
                // Preview model
                break;
    
            case 'advanced_edit':
                // Redirect to advanced edit
                break;
        }
    }
}
