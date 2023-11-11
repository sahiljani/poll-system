<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/polls', [PollController::class, 'listPolls'])->name('admin.polls');

Route::get('/settings', [SettingsController::class, 'show'])->name('settings.show');
Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
});



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/create-poll', [PollController::class, 'create'])->name('create-poll');
Route::post('/create-poll', [PollController::class, 'store'])->name('create-poll-submit');

Route::get('/share-poll/{unique_identifier}', [PollController::class, 'share'])->name('share-poll');
Route::get('/delete-poll/{unique_identifier}', [PollController::class, 'delete'])->name('delete-poll');


Route::post('/poll/{unique_identifier}/vote', [PollController::class, 'vote'])->name('vote');
Route::get('/poll/{unique_identifier}/result', [PollController::class, 'showVote'])->name('show-vote');

Route::get('/poll/{unique_identifier}', [PollController::class, 'show'])->name('show-poll')->middleware('record_poll_view');;
Route::get('/polls', [PollController::class, 'listPollsWithOptions'])->name('show-poll-Json');



require __DIR__.'/auth.php';
