<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;

use App\Http\Controllers\AuthLogout;
use App\Http\Middleware\SuperAdmin;
use App\Http\Middleware\User;
use Illuminate\Support\Facades\Auth;
Route::view('/', 'welcome');




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
      if(Auth::user()->role == 1){
    return redirect()->route('admindashboard');
        } else {
    return redirect()->route('userdashboard');
        }


    })->name('dashboard');
});


Route::post('/logout', [AuthLogout::class, 'logout'])->name('logouts');

Route::prefix('admin')->middleware(['auth', admin::class])->group(function () {
    Route::get('/Admindashboard', function () {
        return view('admin.index');
    })->name('admindashboard');

       Route::get('/admin.products', function () {
        return view('admin.products');
    })->name('admin.products');

   Route::get('/admin.orders', function () {
        return view('admin.orders');
    })->name('admin.orders');

       Route::get('/admin.orders', function () {
        return view('admin.orders');
    })->name('admin.orders');

        Route::get('/admin.message', function () {
        return view('admin.message');
    })->name('admin.message');

});


Route::prefix('User')->middleware(['auth', User::class])->group(function () {
    Route::get('/userdashboard', function () {
        return view('user.index');
    })->name('userdashboard');
   Route::get('/user.products', function () {
        return view('user.products');
    })->name('user.products');

      Route::get('/user.order', function () {
        return view('user.order');
    })->name('user.order');
       Route::get('/user.message', function () {
        return view('user.message');
    })->name('user.message');


});


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
