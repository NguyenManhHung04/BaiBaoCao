<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class Hungpost extends Controller
{
    public function Index()
    {
        $post_list = Post::where('status', '=', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        return view('frontend.Hungpost', compact('post_list'));
    }
    public function post_detail($slug)
    {
        $post = Post::where([['status', '=', 1], ['slug', '=', $slug], ['type', '=', 'post']])->first();
        $post_list = Post::where([['status', '=', 1], ['id', '!=', $post->id], ['topic_id', '=', $post->topic_id], ['type', '=', 'post']])
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();
        return view('frontend.postdetail', compact('post', 'post_list'));
    }
    public function topic($slug)
    {

        $row = Topic::where([['slug', '=', $slug], ['status', '=', 1]])
            ->select("id", "name", "slug")->first();

        $post_list = Post::where('status', '=', 1)
            ->whereIn('topic_id', $row)
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        return view('frontend.post_category', compact('post_list', 'row'));
    }
}
