<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTopicRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UpdateStoreTopicRequest;

class TopicController extends Controller
{
    /**
     * Displ
     * ay a listing of the resource.
     */
    public function restore(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->status = 2;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;

        $topic->save();
        return redirect()->route('admin.topic.trash')->with('success', 'Topic đã được khôi phục thành công.');
    }
    public function delete(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;

        $topic->save();
        return redirect()->route('admin.topic.index')->with('success', 'Topic đã được xóa vào thùng rác thành công.');
    }
    public function status(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->status = ($topic->status == 1) ? 2 : 1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;

        $topic->save();
        return redirect()->route('admin.topic.index')->with('success', 'Topic đã được thay đổi trạng thái thành công.');
    }
    public function trash()
    {
        $list = Topic::where('status', '=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "name", "slug", "description", "sort_order", "status")
            ->get();

        return view("backend.topic.trash", compact("list"));
    }
    public function index()
    {
        $list = Topic::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "name", "slug", "description", "sort_order", "status")
            ->get();
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>sau: " . $row->name . "</option>";
        }
        return view("backend.topic.index", compact("list", "htmlsortorder"));
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
    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = Auth::id() ?? 1;
        $topic->save();
        return redirect()->route('admin.topic.index')->with('success', 'Topic đã được thêm mới thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        return view("backend.topic.show", compact("topic"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $list = Topic::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "name", "slug", "description", "sort_order", "status")
            ->get();
        $htmlsortorder = "";
        foreach ($list as $row) {
            if ($topic->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>sau: " . $row->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>sau: " . $row->name . "</option>";
            }
        }
        return view("backend.topic.edit", compact("list", "htmlsortorder", "topic"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreTopicRequest $request, string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->name = $request->name;
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->save();
        return redirect()->route('admin.topic.index')->with('success', 'Topic đã được chỉnh sữa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->delete();
        return redirect()->route('admin.topic.trash')->with('success', 'Topic đã được xóa khỏi cơ sở dữ liệu thành công.');
    }
}
