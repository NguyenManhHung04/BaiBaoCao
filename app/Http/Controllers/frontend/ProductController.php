<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index()
    {
        $product_list = Product::where('status', '=', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        return view('frontend.allproduct', compact('product_list'));
    }
    public function getlistcategoryid($rowid)
    {
        $listcatid = [];

        array_push($listcatid, $rowid);
        $list1 = Category::where([['parent_id', '=', $rowid], ['status', '=', 1]])
            ->select("id")->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listcatid, $row1->id);
                $list2 = Category::where([['parent_id', '=', $row1->id], ['status', '=', 1]])
                    ->select("id")->get();
                if (count($list2) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listcatid, $row2->id);
                    }
                }
            }
        }
        return  $listcatid;
    }
    public function category($slug)
    {
        $category = Category::where([['slug', '=', $slug], ['status', '=', 1]])
            ->select("id", "name", "slug")->first();
        $listcatid = [];
        if ($category != null) {
            $listcatid = $this->getlistcategoryid($category->id);
        }

        $product_list = Product::where('status', '=', 1)
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        return view('frontend.product_category', compact('product_list', 'category'));
    }
    public function Product_detail($slug)
    {
        $product = Product::where([['slug', '=', $slug], ['status', '=', 1]])
            ->first();
        $listcatid = $this->getlistcategoryid($product->category_id);
        $product_list = Product::where([['status', '=', 1], ['id', '!=', $product->id]])
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        return view('frontend.product_detail', compact('product', 'product_list'));
    }
}
