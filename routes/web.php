<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Mail\SendmailSubscribe;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//hieu
Route::resource('chats', \App\Http\Controllers\ChatController::class);
//hieu
Route::post('/getmessages', [\App\Http\Controllers\ChatController::class, 'get']);

Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/pricing', [\App\Http\Controllers\PricingController::class, 'index'])->name('pricing');
Route::get('/help', [\App\Http\Controllers\HelpController::class, 'index'])->name('help');

#reload div ajax
Route::get('/loadinbox', function (){
    return view('admin.loadinbox');
});
    Route::get('/loadnoticemess', function (){
        return view('admin.inbox.messagenotice');
    });
Route::get('/users/table.blade.php', function (){
    return view('admin.users.table');
});

#end reload
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.capnhat');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/detail/{name}', [\App\Http\Controllers\DetailController::class, 'index']);
Route::put('/detail/{name}', [\App\Http\Controllers\DetailController::class, 'update']);

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::post('/fetch', [\App\Http\Controllers\Controller::class, 'fetch']);
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->middleware('admin')->name('admin-home');
    Route::resource('users', \App\Http\Controllers\UserManagementController::class);
    //hieu
    Route::resource('inbox', \App\Http\Controllers\InboxController::class);
    Route::resource('movies', \App\Http\Controllers\MovieManagementController::class);
    Route::resource('director', \App\Http\Controllers\DirectorManagementController::class);
    Route::resource('writer', \App\Http\Controllers\WriterManagementController::class);
    Route::resource('genre', \App\Http\Controllers\GenreManagementController::class);
    Route::resource('actor', \App\Http\Controllers\CastManagementController::class);
    Route::get('chart', function(){
        return view('admin.chart');
    });
});
Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/home/genre/{name}', [App\Http\Controllers\GenreController::class, 'index']);

# Chia trang
    Route::get('/pagination', 'PaginationController@index');
    
    Route::post('pagination/fetch', 'PaginationController@fetch')->name('pagination.fetch');
#
Route::get('/test', [App\Http\Controllers\MailController::class, 'test']);
Route::get('/test', [App\Http\Controllers\MailController::class, 'sendEmail']);
Route::fallback(function () {
    return view('404');
});
