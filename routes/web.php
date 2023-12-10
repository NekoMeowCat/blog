<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ViewProfileController;
use App\Http\Controllers\EditPostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $posts = Post::where('user_id', Auth::id())->paginate(5); 

    return view('dashboard', ['posts' => $posts]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/add-post', [PostController::class, 'create'])->name('add-post');
    Route::post('/posts', [PostController::class, 'store'])->name('post.addPost');
    Route::get('/editpost/{post}', [EditPostController::class, 'edit'])->name('editpost.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

});

Route::middleware('auth')->get('/viewpost/{id}', [ViewPostController::class, 'viewPost'])->name('viewpost');
Route::middleware('auth')->post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::middleware('auth')->get('/viewprofile', [ViewProfileController::class, 'show'])->name('viewprofile');









require __DIR__.'/auth.php';
