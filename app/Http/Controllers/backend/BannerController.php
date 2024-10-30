<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateStoreBannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function restore(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 2;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;

        $banner->save();
        return redirect()->route('admin.banner.trash')->with('success', 'Banner đã được khôi phục thành công thành công.');
    }
    public function delete(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 0;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;

        $banner->save();
        return redirect()->route('admin.banner.index')->with('success', 'Banner đã được xáo vào thùng rác thành công thành công.');
    }
    public function status($id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            $banner->status = $banner->status == 1 ? 2 : 1;
            $banner->save();
        }
        return redirect()->route('admin.banner.index')->with('success', 'Banner đã được cập nhật trạng thái thành công thành công.');
    }
    public function trash()
    {
        $list = Banner::where('status', '=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'image', 'name', 'link', 'position')
            ->get();

        return view("backend.banner.trash", compact("list"));
    }
    public function index()
    {
        $list = Banner::where('status', '!=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('*')
            ->get();

        return view("backend.banner.index", compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $list = Banner::where('status', '!=', 0)
    //         ->orderBy('created_at', 'DESC')
    //         ->select('id', 'image', 'name', 'link', 'position')
    //         ->get();

    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->description = $request->description;
        // Corrected typo here
        // $banner->image = $request->image;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                // Generate a unique filename by appending the current timestamp
                $fileName = $banner->slug . '-' . time() . '.' . $exten;
                $request->image->move(public_path('images/banners/'), $fileName);
                $banner->image = $fileName;
            }
        }
        $banner->status = $request->status;
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index')->with('success', 'Banner đã được thêm thành công thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        return view("backend.banner.show", compact("banner"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $list = Banner::where('status', '!=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name')
            ->get();

        return view("backend.banner.edit", compact("list", "banner"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreBannerRequest $request, string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->description = $request->description;
        // Corrected typo here
        // $banner->image = $request->image;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                // Generate a unique filename by appending the current timestamp
                $fileName = $banner->slug . '-' . time() . '.' . $exten;
                $request->image->move(public_path('images/banners/'), $fileName);
                $banner->image = $fileName;
            }
        }
        $banner->status = $request->status;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;

        $banner->save();
        return redirect()->route('admin.banner.index')->with('success', 'Banner đã được cập nhật thành công thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->delete();
        return redirect()->route('admin.banner.trash')->with('success', 'Banner đã được xóa khỏi cơ sở dữ liệu thành công thành công.');
    }
}
