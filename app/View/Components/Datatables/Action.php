<?php

namespace App\View\Components\Datatables;

use Illuminate\View\Component;

class Action extends Component
{
    /**
     * List of action with matching routes.
     *
     * @var array
     */
    public $actionRoutes;

    /**
     * Item Slug Name.
     *
     * @var string
     */
    public $itemSlug;

    /**
     * Item Slug Value.
     *
     * @var string
     */
    public $itemSlugValue;

    /**
     * Create a new component instance.
     *
     * @param  string  $editRouteName
     * @param  string  $itemSlug
     * @param  string  $itemSlugValue
     * @return void
     */
    public function __construct($actionRoutes, $itemSlug, $itemSlugValue)
    {
        $this->actionRoutes = $actionRoutes;
        $this->itemSlug = $itemSlug;
        $this->itemSlugValue = $itemSlugValue;
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
