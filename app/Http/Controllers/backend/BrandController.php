<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateStoreBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function restore(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 2;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;

        $brand->save();
        return redirect()->route('admin.brand.trash')->with('success', 'Brand đã được khôi phục thành công.');
    }
    public function delete(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;

        $brand->save();
        return redirect()->route('admin.brand.index')->with('success', 'Brand đã được xáo vào thùng rác thành công thành công.');
    }

    /////////////////
    public function status($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
            $brand->status = $brand->status == 1 ? 2 : 1;
            $brand->save();
        }

        return redirect()->route('admin.brand.index')->with('success', 'Brand đã được cập nhật trạng thái thành công.');
    }
    public function index()
    {
        $list = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "image", "name", "slug", "status", "sort_order")
            ->get();
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>sau: " . $row->name . "</option>";
        }
        return view("backend.brand.index", compact("list", "htmlsortorder"));
    }

    public function trash()
    {
        $list = Brand::where('status', '=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "image", "name", "slug", "status", "sort_order")
            ->get();
        return view("backend.brand.trash", compact("list"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;
        // $brand->image=$request->image;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "git", "webp"])) {
                $fileName = $brand->slug . "." . $exten;
                $request->image->move(public_path('images/brands/'), $fileName);
                $brand->image = $fileName;
            }
        }
        $brand->status = $request->status;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id() ?? 1;

        $brand->save();
        return redirect()->route('admin.brand.index')->with('success', 'Brand đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        return view("backend.brand.show", compact("brand"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $list = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "image", "name", "sort_order")
            ->get();
        $htmlsortorder = "";
        foreach ($list as $row) {
            if ($brand->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>sau: " . $row->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>sau: " . $row->name . "</option>";
            }
        }
        return view("backend.brand.edit", compact("list", "htmlsortorder", "brand"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreBrandRequest $request, string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;
        // $brand->image=$request->image;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "git", "webp"])) {
                $fileName = $brand->slug . "." . $exten;
                $request->image->move(public_path('images/brands/'), $fileName);
                $brand->image = $fileName;
            }
        }
        $brand->status = $request->status;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;

        $brand->save();
        return redirect()->route('admin.brand.index')->with('success', 'Brand đã được chỉnh sữa thành công.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->delete();
        return redirect()->route('admin.brand.trash')->with('success', 'Brand đã được  thành công.');;
    }
}
