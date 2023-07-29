<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class ViewProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $post = Post::where('user_id', $user->id)->first();

        return view('viewprofile', compact('user', 'post'));
    }
}
