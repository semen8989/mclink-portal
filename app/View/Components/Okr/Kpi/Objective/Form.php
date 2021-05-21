<?php

namespace App\View\Components\Okr\Kpi\Objective;

use App\Models\KpiObjective;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * KPI objective model object.
     *
     * @var object
     */
    public $kpiObjective;

    /**
     * List of year in an array.
     *
     * @var array
     */
    public $yearList;

    /**
     * List of quarter in an array.
     *
     * @var array
     */
    public $quarterList;

    /**
     * Create a new component instance.
     *
     * @param  object  $kpiObjective
     * @param  array  $yearList
     * @return void
     */
    public function __construct($kpiObjective = null, $yearList = null)
    {
        $this->kpiObjective = $kpiObjective;
        $this->yearList = $yearList;
        $this->quarterList = KpiObjective::QUARTER;   
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.okr.kpi.objective.form');
    }
}
