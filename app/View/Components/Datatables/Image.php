<?php

namespace App\View\Components\Datatables;

use Illuminate\View\Component;

class Image extends Component
{
    /**
     * The URL of the employee profile image.
     *
     * @var string
     */
    public $imageLink;

    /**
     * Create a new component instance.
     *
     * @param  string  $imageLink
     * @return void
     */
    public function __construct($imageLink)
    {
        $this->imageLink = $imageLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.datatables.image-column');
    }
}
