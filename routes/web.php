<?php

use App\Http\Controllers\ForgetPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\qnaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});


Route::get('/admin', [UserController::class, 'index']);


Route::get('/qna', [qnaController::class, 'index'])->middleware('auth');
Route::post('/qna/{id}', [qnaController::class, 'create'])->middleware('auth');
Route::get('/qna/{id}', [qnaController::class, 'show'])->middleware('auth');
Route::post('/qna10/{id}', [qnaController::class, 'komentar'])->middleware('auth');
Route::delete('/qna11/{id}', [qnaController::class, 'hapusjawaban'])->middleware('auth');
Route::post('/qna3/{id}', [qnaController::class, 'pinJawaban'])->middleware('auth');
Route::post('/qna4/{id}', [qnaController::class, 'unpinJawaban'])->middleware('auth');
Route::delete('/qna9/{id}', [qnaController::class, 'hapusKomentar'])->middleware('auth');
Route::post('/qna5/{id}', [qnaController::class, 'pinkomentar'])->middleware('auth');
Route::post('/qna6/{id}', [qnaController::class, 'unpinkomentar'])->middleware('auth');
Route::post('/qna7/{id}', [qnaController::class, 'voteJawaban'])->middleware('auth');
Route::delete('/qna12/{id}', [qnaController::class, 'hapuspertanyaan'])->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [logoutController::class, 'index'])->middleware('auth');

Route::post('/lupapassword', [ForgetPassword::class, 'reset'])->name('password.update');
Route::get('/lupapassword', [ForgetPassword::class, 'showResetForm']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);
Route::post('/register/otp', [RegisterController::class, 'otp'])->name('register.otp');

Route::get('/ask', [PertanyaanController::class, 'index'])->middleware('auth');
Route::post('/ask', [PertanyaanController::class, 'create'])->middleware('auth');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/admin', [UserController::class, 'index'])->name('admin.index')->middleware('auth');
Route::put('/admin/{id}', [UserController::class, 'update'])->middleware('auth');
Route::post('/admin3/{id}', [UserController::class, 'ban'])->middleware('auth')->name('admin.ban');
Route::post('/admin4/{id}', [UserController::class, 'unban'])->middleware('auth')->name('admin.unban');
Route::get('/admin5', [UserController::class, 'halamanBan'])->name('admin.ban')->middleware('auth');
Route::post('/admin5', [UserController::class, 'processBan'])->name('admin.processBan')->middleware('auth');
Route::post('/admin6/{id}', [UserController::class, 'suspendUser'])->name('admin.suspend');
Route::post('/admin7/{id}', [UserController::class, 'unsuspendUser'])->name('users.unsuspend');
Route::get('/admin8', [UserController::class, 'HalamanSuspend'])->name('admin.suspend')->middleware('auth');
Route::post('/admin8', [UserController::class, 'processSuspend'])->name('users.processSuspend')->middleware('auth');



Route::get('/superuser', [UserController::class, 'superuser'])->name('superuser.index')->middleware('auth');
Route::put('/superuser/{id}', [UserController::class, 'update2'])->middleware('auth');
Route::post('/superuser1/{id}', [UserController::class, 'ban'])->middleware('auth')->name('superuser.ban');
Route::post('/superuser2/{id}', [UserController::class, 'unban'])->middleware('auth')->name('superuser.unban');
Route::get('/superuser3', [UserController::class, 'halamanBan2'])->name('superuser.ban')->middleware('auth');
Route::post('/superuser3', [UserController::class, 'processBan'])->name('admin.processBan')->middleware('auth');
