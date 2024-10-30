<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMenuRequest;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function restore(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 2;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;

        $menu->save();
        return redirect()->route('admin.menu.trash')->with('success', 'Menu đã được khô phục thành công.');
    }
    public function delete(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 0;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;

        $menu->save();
        return redirect()->route('admin.menu.index')->with('success', 'Menu đã được xóa vào thùng rác thành công.');
    }
    public function status($id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
            $menu->status = $menu->status == 1 ? 2 : 1;
            $menu->save();
        }

        return redirect()->route('admin.menu.index')->with('success', 'Menu đã được thay đổi trạng thái thành công.');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $topics = Topic::all();
        $pages = Post::where('type', 'page')->get();
        $posts = Post::where('type', 'post')->get();
        $list = Menu::where('status', '!=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('*')
            ->get();

        return view('backend.menu.index', compact('list', 'categories', 'brands', 'topics', 'pages', 'posts'));
    }
    public function trash()
    {
        $list = Menu::where('status', '=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'link', 'name', 'position', 'status')
            ->get();
        return view('backend.menu.trash', compact('list'));
    }
    public function store(Request $request)
    {
        $userId = Auth::id();
        $position = $request->position;
        $status = $request->status;

        if ($request->has('createCategory') && $request->categories) {
            foreach ($request->categories as $categoryId) {
                $category = Category::find($categoryId);
                if ($category) {
                    $parentSlug = $category->parent ? $category->parent->slug : '';
                    Menu::create([
                        'name' => $category->name,
                        'link' => 'danh-muc' . $parentSlug . '/' . $category->slug,
                        'position' => $position,
                        'status' => $status,
                        'created_by' => Auth::id() ?? 1,
                        'type' => 'category'
                    ]);
                }
            }
        }

        if ($request->has('createBrand') && $request->brands) {
            foreach ($request->brands as $brandId) {
                $brand = Brand::find($brandId);
                if ($brand) {
                    Menu::create([
                        'name' => $brand->name,
                        'link' => 'thuong-hieu' . $parentSlug . '/' . $brand->slug,
                        'position' => $position,
                        'status' => $status,
                        'created_by' => Auth::id() ?? 1,
                        'type' => 'brand'
                    ]);
                }
            }
        }

        if ($request->has('createTopic') && $request->topics) {
            foreach ($request->topics as $topicId) {
                $topic = Topic::find($topicId);
                if ($topic) {
                    Menu::create([
                        'name' => $topic->name,
                        'link' => 'chu-de' . $parentSlug . '/' . $topic->slug,
                        'position' => $position,
                        'status' => $status,
                        'created_by' => Auth::id() ?? 1,
                        'type' => 'topic'
                    ]);
                }
            }
        }
        if ($request->has('createPage') && $request->pages) {
            foreach ($request->pages as $pageId) {
                $page = Post::find($pageId);
                if ($page) {
                    Menu::create([
                        'name' => $page->title,
                        'link' => 'trang-don' . $parentSlug . '/' . $page->slug,
                        'position' => $position,
                        'status' => $status,
                        'created_by' => Auth::id() ?? 1,
                        'type' => 'page'
                    ]);
                }
            }
        }

        if ($request->has('createCustom')) {
            Menu::create([
                'name' => $request->name,
                'link' => $request->link,
                'position' => $position,
                'created_by' => Auth::id() ?? 1,
                'type' => 'custom'
            ]);
        }

        return redirect()->route('admin.menu.index')->with('success', 'Menu đã được thêm thành công.');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        return view("backend.menu.show", compact("menu"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('admin.menu.index');
        }
        $categories = Category::all();
        $brands = Brand::all();
        $topics = Topic::all();
        $pages = Post::where('type', 'page')->get();
        $posts = Post::where('type', 'post')->get();
        $list = Menu::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'link', 'name', 'position', 'status')
            ->get();

        return view('backend.menu.edit', compact('menu', 'list', 'categories', 'brands', 'topics', 'pages', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('admin.menu.index');
        }
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->position = $request->position;
        $menu->status = $request->status;
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('admin.menu.index')->with('success', 'Menu đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->delete();
        return redirect()->route('admin.menu.trash')->with('success', 'Menu đã được xóa khỏi cơ sở dữ liệu thành công.');
    }
}
