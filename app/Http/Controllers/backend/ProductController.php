<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand; // Sử dụng model Brand

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateStoreProductRequest;

class ProductController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     */
    public function restore(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;

        $product->save();
        return redirect()->route('admin.product.trash')->with('success', 'Product đã được khôi phục thành công.');
    }
    public function delete(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;

        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Product đã được xóa vào thùng rác thành công.');
    }
    public function status(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;

        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Product đã được thay đổi trạng thái thành công.');
    }
    public function index()
    {
        $list = Product::where('product.status', '!=', 0)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('brand', 'product.brand_id', '=', 'brand.id')
            ->orderBy('product.created_at', 'desc')
            ->select("product.id", "product.name", "product.image", "category.name as categoryname", "brand.name as brandname", "product.status")
            ->get();
        return view("backend.product.index", compact("list"));
    }
    public function trash()
    {
        $list = Product::where('product.status', '=', 0)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('brand', 'product.brand_id', '=', 'brand.id')
            ->orderBy('product.created_at', 'desc')
            ->select("product.id", "product.name", "product.image", "category.name as categoryname", "brand.name as brandname")
            ->get();
        return view("backend.product.trash", compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    private function getBrands()
    {
        return Brand::where('status', '!=', 0)->orderBy('name')->get();
    }
    public function create()
    {
        $list = Product::where('product.status', '!=', 0)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('brand', 'product.brand_id', '=', 'brand.id')
            ->orderBy('product.created_at', 'DESC')
            ->select("product.id", "product.name", "product.image", "category.name as categoryname", "brand.name as brandname")
            ->get();
        $categories = Category::where('status', '!=', 0)->orderBy('name')->get();
        $brands = $this->getBrands();
        return view("backend.product.create", compact("list", "categories", "brands"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->slug = Str::of($request->name)->slug('-');
        // $product->image=$request->image;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                // Generate a unique filename by appending the current timestamp
                $fileName = $product->slug . '-' . time() . '.' . $exten;
                $request->image->move(public_path('images/products/'), $fileName);
                $product->image = $fileName;
            }
        }


        $product->status = $request->status;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = Auth::id() ?? 1;

        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Product đã được thêm mới thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        return view("backend.product.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        // $list = Product::where('product.status','!=',0)
        // ->join('category','product.category_id','=','category.id')
        // ->join('brand','product.brand_id','=','brand.id')
        // ->orderBy('product.created_at','DESC')
        // ->select("product.id","product.name","product.image","category.name as categoryname","brand.name as brandname")
        // ->get();
        $categories = Category::where('status', '!=', 0)->orderBy('name')->get();
        $brands = $this->getBrands();
        return view("backend.product.edit", compact("product", "categories", "brands"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreProductRequest $request, string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        // $product->image=$request->image;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "git", "webp"])) {
                $fileName = $product->slug . "." . $exten;
                $request->image->move(public_path('images/products/'), $fileName);
                $product->image = $fileName;
            }
        }
        $product->slug = Str::of($request->name)->slug('-');
        $product->status = $request->status;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;

        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Product đã được chỉnh sữa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->delete();
        return redirect()->route('admin.product.trash')->with('success', 'Product đã được xóa khỏi cơ sỡ dữ liệu thành công.');
    }
}
