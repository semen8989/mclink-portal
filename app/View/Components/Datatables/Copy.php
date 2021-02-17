<?php

namespace App\View\Components\Datatables;

use Illuminate\View\Component;

class Copy extends Component
{
    /**
     * Acknowledgement form route name.
     *
     * @var string
     */
    public $acknowledgementRouteName;

    /**
     * Parameter key.
     *
     * @var string
     */
    public $paramName;

    /**
     * Parameter Value.
     *
     * @var string
     */
    public $paramValue;

    /**
     * Create a new component instance.
     *
     * @param  string  $acknowledgementRouteName
     * @param  string  $paramName
     * @param  string  $paramValue
     * @return void
     */
    public function __construct($acknowledgementRouteName, $paramName, $paramValue)
    {
        $this->acknowledgementRouteName = $acknowledgementRouteName;
        $this->paramName = $paramName;
        $this->paramValue = $paramValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.datatables.copy');
    }
}
