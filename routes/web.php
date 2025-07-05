<?php

// use App\Livewire\Settings\Appearance;
// use App\Livewire\Settings\Password;
// use App\Livewire\Settings\Profile;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Route::get('settings/profile', Profile::class)->name('settings.profile');
//     Route::get('settings/password', Password::class)->name('settings.password');
//     Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
// });

use App\Livewire\CoursesList;
use App\Livewire\Counter;
use App\Livewire\CreateCourse;
use App\Livewire\CourseDetail;
use App\Livewire\CreateContent;
use App\Livewire\EditCourse;
use App\Livewire\EnrolledStudents;
use App\Livewire\Auth\LoginForm;
use App\Livewire\Auth\RegisterForm;

Route::get('/signin', LoginForm::class)->name('signin');
Route::get('/signup', RegisterForm::class)->name('signup');

Route::get('/', CoursesList::class);
Route::get('/home', CoursesList::class)->name('home');
Route::get('/courses', CoursesList::class)->name('courses');
Route::get('/create-course', CreateCourse::class)->name('courses.create');
Route::get('/course/{course}', CourseDetail::class)->name('courses.show');
Route::get('/courses/{course}/edit', EditCourse::class)->name('courses.edit');
Route::get('/course/{course}/add-content', CreateContent::class)->name('courses.content.create');
Route::get('/counter', Counter::class);

Route::get('/courses/{slug}/students', EnrolledStudents::class)->name('courses.students');


require __DIR__ . '/auth.php';
