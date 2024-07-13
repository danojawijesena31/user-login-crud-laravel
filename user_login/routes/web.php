<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager; 
use App\Http\Controllers\MemberController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home'); 

// Route::get('/', function(){
//     return view('members.index');
// })->name('home');

Route::get('/login',[AuthManager::class,'login'])->name('login');
Route::get('/registration',[AuthManager::class,'registration'])->name('registration'); 

Route::post('/login_submit',[AuthManager::class,'loginPost'])->name('login.post');
Route::post('/registration_submit',[AuthManager::class,'registartionPost'])->name('registration.post'); 

Route::get('/logout',[AuthManager::class,'logout'])->name('logout'); 

Route::group(['middleware' => 'auth'], function (){
    Route::get('/profile', function(){
        return "Hi";
    });
});


// Member route

Route::get('/', [MemberController::class, 'index'])->name('member.index'); 
Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
Route::post('/member', [MemberController::class, 'memberPost'])->name('member.post');
Route::get('/member/{member}/edit', [MemberController::class, 'edit'])->name('member.edit');
Route::put('/member/{member}/update', [MemberController::class, 'update'])->name('member.update'); 
Route::delete('/member/{member}/delete', [MemberController::class, 'delete'])->name('member.delete'); 

Route::get('/member/view/{member}', [MemberController::class, 'view'])->name('member.view');



  