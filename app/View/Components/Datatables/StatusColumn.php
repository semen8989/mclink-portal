<?php

namespace App\View\Components\Datatables;

use Illuminate\View\Component;

class StatusColumn extends Component
{
    /**
     * Column data.
     *
     * @var string
     */
    public $columnData;

    /**
     * The color of badge.
     *
     * @var string
     */
    public $badgeColor;


    /**
     * Create a new component instance.
     *
     * @param  string  $columnData
     * @param  string  $badgeColor
     * @return void
     */
    public function __construct($columnData, $badgeColor)
    {
        $this->columnData = $columnData;
        $this->badgeColor = $badgeColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.datatables.status-column');
    }
}
