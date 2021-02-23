<?php

namespace App\View\Components\Datatables;

use Illuminate\View\Component;

class ShowColumn extends Component
{
    /**
     * Route name.
     *
     * @var string
     */
    public $showRouteName;

    /**
     * Route Slug Name.
     *
     * @var string
     */
    public $showRouteSlug;

    /**
     * Route Slug Value.
     *
     * @var string
     */
    public $showRouteSlugValue;

    /**
     * Column data.
     *
     * @var string
     */
    public $columnData;

    /**
     * Create a new component instance.
     *
     * @param  string  $showRouteName
     * @param  string  $showRouteSlug
     * @param  string  $showRouteSlugValue
     * @param  string  $columnData
     * @return void
     */
    public function __construct($showRouteName, $showRouteSlug, $showRouteSlugValue, $columnData)
    {
        $this->showRouteName = $showRouteName;
        $this->showRouteSlug = $showRouteSlug;
        $this->showRouteSlugValue = $showRouteSlugValue;
        $this->columnData = $columnData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.datatables.show-column');
    }
}
