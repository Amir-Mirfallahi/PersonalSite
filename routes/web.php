<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Resources\AboutImageResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\ProjectResource;
use App\Models\AboutImage;
use App\Models\AvailableAt;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Home/Home');
})->name('home');

Route::get('/about', function () {
    $aboutImages = AboutImage::all();
    return inertia("About/About", ["aboutImages" => AboutImageResource::collection($aboutImages)]);
})->name('about');

Route::get('/projects', function () {
    $projects = Project::query()->orderBy("id", "desc")->paginate(6)->onEachSide(1);
    return inertia("Projects/Projects", ["projects" => ProjectResource::collection($projects)]);
})->name('projects');

Route::get('/projects/{project}', function (Project $project) {
    $socialMedia = AvailableAt::all();
    return inertia("Projects/Show", ["project" => new ProjectResource($project), "socialMedia" => $socialMedia]);
})->name('projects.show');

Route::get('/blog', function () {
    $posts = Post::query()->orderBy("id", "desc")->paginate(6)->onEachSide(1);
    return inertia("Blog/Blog", ["posts" => PostResource::collection($posts)]);
})->name('blog');

Route::get('/blog/{post:slug}', function (Post $post) {
    $socialMedia = AvailableAt::all();
    return inertia("Blog/Show", ["post" => new PostResource($post), "socialMedia" => $socialMedia]);
})->name('blog.show');

Route::get('/contact', function () {
    return inertia("Contact/Contact");
})->name('contact');

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
