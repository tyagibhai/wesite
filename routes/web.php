<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Pages\Home\Index as HomeComponent;
use App\Http\Livewire\Pages\Article\Index as ArticleComponent;
use App\Http\Livewire\Pages\Contact\Index as ContactComponent;
use App\Http\Livewire\Pages\Search\Index as SearchComponent;

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

//frontend routes
Route::get('/',HomeComponent::class)->name('home');
Route::get('/contact',ContactComponent::class)->name('contact');
Route::get('/articles/explore/{slug?}',SearchComponent::class)->name('search');
Route::get('/article/{slug}',ArticleComponent::class);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
