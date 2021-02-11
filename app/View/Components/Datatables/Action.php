<?php

namespace App\View\Components\Datatables;

use Illuminate\View\Component;

class Action extends Component
{
    /**
     * Edit route name.
     *
     * @var string
     */
    public $editRouteName;

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
    public function __construct($editRouteName, $itemSlug, $itemSlugValue)
    {
        $this->editRouteName = $editRouteName;
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
