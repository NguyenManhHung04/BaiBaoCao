<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class post extends Component
{
    /**
     * Create a new component instance.
     */
    public $post_item = null;
    public function __construct($postitem)
    {
        $this->post_item = $postitem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $post = $this->post_item;
        return view("components.post", compact("post"));
    }
}
