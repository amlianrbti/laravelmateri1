<?php

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

Route::get('/', function () {
    $html = "
    <h1>Contact APP</h1>
    <div class='container'>
    <a href='" . route('admin.contacts.index') . "'>All contacts</> ||
    <a href='" . route('admin.contacts.create') . "'>Add contacts</> ||
    <a href='" . route('admin.contacts.show', 1) . "'>Show contacts</>
    </div>
    ";

    return $html;
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/contacts', function () {
        return ('<h1>Daftar Kontak</h1>');
    })->name('contacts.index');

    Route::get('/contacts/create', function () {
        return ('<h1>Daftar Kontak</h1>');
    })->name('contacts.create');

    Route::get('/contacts/{id}', function($id) {
        return "Ini Kontak ke-" . $id;
    })->whereNumber('id')->name('contacts.show');

    Route::get('/companies/{name?}', function ($name=null) {
        if($name) {
            return "Nama perusahaan: " . $name;
        } else{
            return "Nama perusahaan kososng";
        }
    })->whereAlphaNumeric('name');
});

Route::fallback(function() {
    return "<h1>Maaf, halaman yang anda tuju tidak ada</h1>";
});