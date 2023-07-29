<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class EditPostController extends Controller
{
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('editpost', ['post' => $post]);
    }
}
