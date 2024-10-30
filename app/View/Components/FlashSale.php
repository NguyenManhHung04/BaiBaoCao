<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class FlashSale extends Component
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
            ['pricesale', '<', 100]
        ];
        $product_list = Product::where($args)
            ->orderBy('created_at', 'DESC')

            ->get();
        // echo count($product_list);
        return view('components.flash-sale', compact('product_list'));
    }
}
