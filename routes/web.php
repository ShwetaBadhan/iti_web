<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('home');


Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('about');

Route::get('/chairman-message', function () {
    return view('pages.chairman-message');
})->name('chairman-message');

Route::get('/our-team', function () {
    return view('pages.our-team');
})->name('our-team');

Route::get('/courses', function () {
    return view('pages.courses');
})->name('courses');

Route::get('/course-details', function () {
    return view('pages.courses.course-details');
})->name('course-details');

Route::get('/trade-courses', function () {
    return view('pages.courses.trade-courses');
})->name('trade-courses');

Route::get('/auto-electrician', function () {
    return view('pages.auto-electrician.index');
})->name('auto-electrician');

Route::get('/automobile', function () {
    return view('pages.automobile.index');
})->name('automobile');