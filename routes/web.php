<?php

use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DiscussController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DisscussController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\DiscussionsController;
use App\Http\Controllers\ProfileAuthController;

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
Auth::routes();



Route::middleware(['auth', 'check_user:admin'])->group(function () {
    
    // Route::post('login', [Auth::class]) function ($id) {
        
    // });
    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::patch('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/admin/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

    Route::get('/admin/profiles', [ProfilesController::class, 'index'])->name('admin.profile.index');
    Route::get('/admin/profiles/create', [ProfilesController::class, 'create'])->name('admin.profile.create');
    Route::patch('/admin/profiles/store', [ProfilesController::class, 'store'])->name('admin.profile.store');
    Route::get('/admin/profiles/edit/{id}', [ProfilesController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profiles/update/{id}', [ProfilesController::class, 'update'])->name('admin.profile.update');
    Route::get('/admin/profiles/show/{id}', [ProfilesController::class, 'show'])->name('admin.profile.show');
    Route::delete('/admin/profiles/delete/{id}', [ProfilesController::class, 'destroy'])->name('admin.profile.delete');
    
    Route::get('/admin/discussions', [DiscussionsController::class, 'index'])->name('admin.discuss.index');
    Route::get('/admin/discussions/show/{id}', [DiscussionsController::class, 'show'])->name('admin.discuss.show');
    Route::delete('/admin/discussions/delete/{id}', [DiscussionsController::class, 'destroy'])->name('admin.discuss.delete');
    Route::delete('/admin/replies/delete/{id}', [DiscussionsController::class, 'destroy_replies'])->name('admin.reply.delete');
    
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/admin/users/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');

    Route::get('/admin/topics', [TopicController::class, 'index'])->name('admin.topic.index');
    Route::get('/admin/topics/create', [TopicController::class, 'create'])->name('admin.topic.create');
    Route::post('/admin/topics/store', [TopicController::class, 'store'])->name('admin.topic.store');
    Route::delete('/admin/topics/delete/{id}', [TopicController::class, 'destroy'])->name('admin.topic.delete');
});


Route::middleware(['auth', 'check_user:user'])->group(function () {
    // Route::get('/', function () {
    //     return view('home');
    // });
    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/my-account/show/{id}', [AccountController::class, 'show'])->name('account.show');
    Route::get('/my-account/edit/{id}', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/my-account/update/{id}', [AccountController::class, 'update'])->name('account.update');

    Route::get('/profile', [ProfileController::class, 'category'])->name('profile.index');
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('category');
    Route::get('/profile/find', [ProfileController::class, 'find'])->name('profile.find');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::patch('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/show/{name}', [ProfileController::class, 'show'])->name('profile.show');
    Route::delete('profile/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.delete');

    Route::get('/discussion', [DiscussionController::class, 'index'])->name('discuss.index');
    Route::get('/discussion/create', [DiscussionController::class, 'create'])->name('discuss.create');
    Route::patch('/discussion/store', [DiscussionController::class, 'store'])->name('discuss.store');
    Route::get('/discussion/edit/{id}', [DiscussionController::class, 'edit'])->name('discuss.edit');
    Route::patch('/discussion/update/{id}', [DiscussionController::class, 'update'])->name('discuss.update');
    Route::get('/discussion/show/{id}', [DiscussionController::class, 'show'])->name('discuss.show');
    Route::delete('discussion/delete/{id}', [DiscussionController::class, 'destroy'])->name('discuss.delete');
    Route::post('/discussion/reply/{id}', [DiscussionController::class, 'reply'])->name('discuss.reply');
    Route::delete('/reply/delete/{id}', [DiscussionController::class, 'destroy_replies'])->name('reply.delete');
    // Route::post('like', [DiscussionController::class, 'pressLike'])->name('pressLike');
    // Route::post('/discuss/like/{id}', [DiscussController::class, 'like'])->name('discuss.like');

    // Route::post('/discussions/{discussion}/like', [LikeController::class, 'store'])->name('discussions.like');

    // Route::get('/topics/{topic:slug}', [TopicController::class, 'index'])->name('topic.index');
});






