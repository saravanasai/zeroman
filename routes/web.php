<?php

use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\ClientHomeComponent;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\Components\Forms;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Notifications;
use App\Http\Livewire\Components\Typography;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Environment\EnvironmentShowUpdateComponent;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Lock;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Environment\CreateEnviromentComponent;
use App\Http\Livewire\Environment\EnvironmentListComponent;
use App\Http\Livewire\Transactions;
use App\Http\Livewire\UserUpdateComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UserCreateComponent;
use App\Http\Livewire\Users;


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

Route::redirect('/', '/login');

if (cache('setting' . App\Enums\SystemSettingEnum::CAN_USER_REGISTER->name)) {
    Route::get('/register', Register::class)->name('register');
}


Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');


Route::middleware('auth')->group(function () {


    Route::middleware('isAdmin')->group(function () {
        Route::get('/users', Users::class)->name('users');
        Route::get('/users/create', UserCreateComponent::class)->name('users.create');
        Route::get('/users/show/{id}', UserUpdateComponent::class)->name('users.show');
    });

    Route::prefix('environment')->group(function () {
        Route::get('/', EnvironmentListComponent::class)->name('environment');
        Route::get('/create', CreateEnviromentComponent::class)->name('environment.create');
        Route::get('/{id}', EnvironmentShowUpdateComponent::class)->name('environment.show');
    });


    Route::get('/profile', Profile::class)->name('profile');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/client', ClientHomeComponent::class)->name('client');
    Route::get('/transactions', Transactions::class)->name('transactions');
    Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
    Route::get('/lock', Lock::class)->name('lock');
    Route::get('/buttons', Buttons::class)->name('buttons');
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/forms', Forms::class)->name('forms');
    Route::get('/modals', Modals::class)->name('modals');
    Route::get('/typography', Typography::class)->name('typography');


});
