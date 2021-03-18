<?php

namespace App\View\Components\ServiceReport;

use App\Models\ServiceReport;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Service report csr no.
     *
     * @var string
     */
    public $csrNo;

    /**
     * Service report status.
     *
     * @var array
     */
    public $status;

    /**
     * Service report model object.
     *
     * @var object
     */
    public $serviceReport;

    /**
     * Create a new component instance.
     *
     * @param  string  $csrNo
     * @param  array  $status
     * @param  object  $serviceReport
     * @return void
     */
    public function __construct($csrNo = null, $serviceReport = null)
    {
        $this->csrNo = $csrNo;
        $this->status = ServiceReport::STATUS;
        $this->serviceReport = $serviceReport;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.service-report.form');
    }
}
