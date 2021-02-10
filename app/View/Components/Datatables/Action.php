<?php

namespace App\View\Components\Datatables;

use Illuminate\View\Component;

class Action extends Component
{
    /**
     * Route name.
     *
     * @var string
     */
    public $editRouteName;

    /**
     * Route Slug Name.
     *
     * @var string
     */
    public $editRouteSlug;

    /**
     * Route Slug Value.
     *
     * @var string
     */
    public $editRouteSlugValue;

    /**
     * Create a new component instance.
     *
     * @param  string  $editRouteName
     * @param  string  $editRouteSlug
     * @param  string  $editRouteSlugValue
     * @return void
     */
    public function __construct($editRouteName, $editRouteSlug, $editRouteSlugValue)
    {
        $this->editRouteName = $editRouteName;
        $this->editRouteSlug = $editRouteSlug;
        $this->editRouteSlugValue = $editRouteSlugValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.datatables.action');
    }
}
