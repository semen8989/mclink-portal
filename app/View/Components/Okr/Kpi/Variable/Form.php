<?php

namespace App\View\Components\Okr\Kpi\Variable;

use App\Models\KpiVariable;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * KPI variable model object.
     *
     * @var object
     */
    public $kpiVariable;

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
     * @param  object  $kpiVariable
     * @param  array  $yearList
     * @return void
     */
    public function __construct($kpiVariable = null, $yearList)
    {
        $this->kpiVariable = $kpiVariable;
        $this->yearList = $yearList;
        $this->quarterList = KpiVariable::QUARTER;   
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.okr.kpi.variable.form');
    }
}
