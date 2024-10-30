<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateStorePostRequest;
use App\Models\Topic;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function restore(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->status = 2;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;

        $post->save();
        return redirect()->route('admin.post.trash')->with('success', 'Post đã được khôi phục thành công.');
    }
    public function delete(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->status = 0;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;

        $post->save();
        return redirect()->route('admin.post.index')->with('success', 'Post đã được xóa vào thùng rác thành công.');
    }
    public function status($id)
    {
        $post = Post::find($id);
        if ($post) {
            // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
            $post->status = $post->status == 1 ? 2 : 1;
            $post->save();
        }
        return redirect()->route('admin.post.index')->with('success', 'Post đã được cập nhật trạng thái thành công.');
    }
    public function index()
    {
        $list = Post::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "image", "title", "detail", "type", "status")
            ->get();
        return view("backend.post.index", compact("list"));
    }
    public function trash()
    {
        $list = Post::where('status', '=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "image", "title", "detail", "type", "slug", "status")
            ->get();
        return view("backend.post.trash", compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lấy danh sách bài viết (post) có status khác 0, và join với bảng topic
        $list = Post::where('post.status', '!=', 0)
            ->join('topic', 'post.topic_id', '=', 'topic.id')
            ->orderBy('post.created_at', 'DESC')
            ->select(
                "topic.name as topicname",
                "post.id",
                "post.title",
                "post.slug",
                "post.detail",
                "post.description",
                "post.image",
                "post.status",
                "post.type"
            )
            ->get();
        // Lấy danh sách các chủ đề (topics) có status khác 0, sắp xếp theo tên
        $topics = Topic::where('status', '!=', 0)
            ->orderBy('name')
            ->get();
        // Trả về view "backend.post.create" với dữ liệu list và topics
        return view("backend.post.create", compact("list", "topics"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->topic_id = $request->topic_id;
        $post->type = $request->type;

        // $post->image=$request->image;
        $post->slug = Str::of($request->title)->slug('-');

        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "git", "webp"])) {
                $fileName = $post->slug . "." . $exten;
                $request->image->move(public_path('images/posts/'), $fileName);
                $post->image = $fileName;
            }
        }
        $post->status = $request->status;

        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1;

        $post->save();
        return redirect()->route('admin.post.index')->with('success', 'Post đã được thêm mới thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        return view("backend.post.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $list = Post::where('post.status', '!=', 0)
            ->join('topic', 'post.topic_id', '=', 'topic.id')
            ->orderBy('post.created_at', 'DESC')
            ->select(
                "topic.name as topicname",
                "post.id",
                "post.title",
                "post.slug",
                "post.detail",
                "post.description",
                "post.image",
                "post.status",
                "post.type"
            )
            ->get();
        // Lấy danh sách các chủ đề (topics) có status khác 0, sắp xếp theo tên
        $topics = Topic::where('status', '!=', 0)
            ->orderBy('name')
            ->get();
        return view("backend.post.edit", compact("list", "topics"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStorePostRequest $request, string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->topic_id = $request->topic_id;
        $post->type = $request->type;
        // $post->image=$request->image;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "git", "webp"])) {
                $fileName = $post->slug . "." . $exten;
                $request->image->move(public_path('images/posts/'), $fileName);
                $post->image = $fileName;
            }
        }
        $post->status = $request->status;
        $post->slug = Str::of($request->title)->slug('-');
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;

        $post->save();
        return redirect()->route('admin.post.index')->with('success', 'Post đã được chỉnh sữa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->delete();
        return redirect()->route('admin.post.trash')->with('success', 'Post đã được xóa khỏi cơ sỡ dữ liệu thành công.');
    }
}
