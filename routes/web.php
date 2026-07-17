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

Route::get('/our-mission', function () {
    return view('pages.our-mission');
})->name('our-mission');

Route::get('/truck-dispatch-details', function () {
    return view('pages.courses.truck-dispatch-details');
})->name('truck-dispatch-details');

Route::get('/fire-safety-details', function () {
    return view('pages.courses.fire-safety-details');
})->name('fire-safety-details');

Route::get('/trailer-training-details', function () {
    return view('pages.courses.trailer-training-details');
})->name('trailer-training-details');

Route::get('/forklift-training-details', function () {
    return view('pages.courses.forklift-training-details');
})->name('forklift-training-details');

Route::get('/jcb-training-details', function () {
    return view('pages.courses.jcb-training-details');
})->name('jcb-training-details');

Route::get('/excavator-training-details', function () {
    return view('pages.courses.excavator-training-details');
})->name('excavator-training-details');


Route::get('/motor-mechanic-details', function () {
    return view('pages.courses.motor-mechanic-details');
})->name('motor-mechanic-details');

Route::get('/video-editing-details', function () {
    return view('pages.courses.video-editing-details');
})->name('video-editing-details');

Route::get('/our-gallery', function () {
    return view('pages.our-gallery');
})->name('our-gallery');

Route::get('/contact-us', function () {
    return view('pages.contact-us');
})->name('contact-us');

Route::get('/our-results', function () {
    return view('pages.our-results');
})->name('our-results');

Route::get('/terms-conditions', function () {
    return view('pages.terms-conditions');
})->name('terms-conditions');

Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
})->name('privacy-policy');

Route::get('/director-message', function () {
    return view('pages.director-message');
})->name('director-message');

Route::get('/car-driving-details', function () {
    return view('pages.courses.car-driving-details');
})->name('car-driving-details');

Route::get('/our-blogs', function () {
    return view('pages.our-blogs');
})->name('our-blogs');

Route::get('/blog-details', function () {
    return view('pages.blog-details');
})->name('blog-details');