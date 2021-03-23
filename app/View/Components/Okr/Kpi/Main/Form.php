<?php

namespace App\View\Components\Okr\Kpi\Main;

use Illuminate\View\Component;

class Form extends Component
{
    /**
     * KPI main model object.
     *
     * @var object
     */
    public $kpiMain;

    /**
     * Create a new component instance.
     *
     * @param  object  $kpiMain
     * @return void
     */
    public function __construct($kpiMain = null)
    {
        $this->kpiMain = $kpiMain;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.okr.kpi.main.form');
    }
}
