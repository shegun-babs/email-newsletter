<?php

use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('all-subscribers', function (){
    $data = NewsletterSubscriber::paginate(10);
    return view('all-subscribers', compact('data'));
})->name('all.subscribers');

Route::view('subscribe', 'subscribe')->name('subscribe');
Route::view('unsubscribe', 'unsubscribe')->name('unsubscribe');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
