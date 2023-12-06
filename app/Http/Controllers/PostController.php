<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function create()
   {
      return view ('add-post');
   }

   public function store(Request $request)
   {
      $validatedData = $request->validate([
         'blog-title' => 'required|string|max:255',
         'blog-content' => 'required|string|max:1000',
         'blog-author' => 'nullable|string|max:255',
         'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
      ]);
      

      $post = new Post();
      $post->title = $validatedData['blog-title'];
      $post->body = $validatedData['blog-content'];
      $post->author = $validatedData['blog-author'];

      if ($request->hasFile('post_image')) {
         $postImage = $request->file('post_image');
         $imagePath = $postImage->store('images', 'public');
         $post->image = $imagePath;
      }

      $post->user_id = Auth::id();

      $post->save();

      return redirect()->route('dashboard');
   }

   public function update(Request $request, $id)
   {
      $post = Post::findOrFail($id);

      $post->title = $request->input('blog-title');
      $post->body = $request->input('blog-content');
      $post->author = $request->input('blog-author');

      if ($request->hasFile('post_image')) {
         $image = $request->file('post_image');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $image->storeAs('public/images', $imageName);
         $post->image = 'images/' . $imageName;
      }

      $post->save();

      return redirect()->route('viewprofile', ['id' => $post->id])->with('success', 'Post updated successfully');
   }

   public function edit(Post $post)
   {
      return view('editpost', compact('post'));
   }

   public function destroy(Post $post)
   {
      $post->delete();

      return redirect()->route('viewprofile')->with('success', 'Post deleted successfully.');
   }

}
