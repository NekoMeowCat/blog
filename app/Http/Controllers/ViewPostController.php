<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\Request;

class ViewPostController extends Controller
{
    public function viewPost($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->get();

        return view('viewpost', compact('post', 'comments'));

    }
}
