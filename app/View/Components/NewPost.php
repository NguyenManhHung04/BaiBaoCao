<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewPost extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $args = [
            ['status', '=', 1],
        ];
        $list = Post::where($args)
            ->orderBy('created_at', 'DESC')
            ->limit(2)
            ->get();
        return view('components.new-post',compact('list'));
    }
}
