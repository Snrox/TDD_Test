<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebCreateController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\postController;
use App\Http\Controllers\WebPageController;
use App\Models\Website;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {


    $data = Website::all();
    return Inertia::render('Dashboard',compact('data'));

})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//---------------------------------------------------------------------------------------------------------//

//----------Web------------//

Route::get('/dashboard/web-sites',[WebCreateController::class,'index'])->middleware(['auth', 'verified'])->name('website');
Route::get('/dashboard/web-sites/create',[WebCreateController::class,'create'])->middleware(['auth', 'verified'])->name('website-create');
Route::post('/web-create',[WebCreateController::class, 'store'])->middleware(['auth', 'verified']);

Route::get('/{data}',[WebPageController::class, 'index'])->middleware(['auth', 'verified'])->name('page');

//----------Post------------//

Route::get('/dashboard/posts',[postController::class,'index'])->middleware(['auth', 'verified'])->name('post');
Route::get('/dashboard/posts/create',[postController::class,'create'])->middleware(['auth', 'verified'])->name('post-create');
Route::post('/post-create',[postController::class, 'store'])->middleware(['auth', 'verified']);

//----------Subscribe_post------------//

Route::post('/subscribe',[SubscribeController::class, 'store'])->middleware(['auth', 'verified']);

