<?php

Route::group(['prefix' => 'yonetim/kullanici', 'namespace' => 'Modul\userModul\Http\Controllers','middleware' => ['web','auth']], function () {
    Route::match(['get', 'post'], '/', 'KullaniciController@index')->name('yonetim.kullanici');

    Route::get('/yeni', 'KullaniciController@form')->name('yonetim.kullanici.yeni');
    Route::get('/duzenle/{id}', 'KullaniciController@form')->name('yonetim.kullanici.duzenle');
    Route::post('/kaydet/{id?}', 'KullaniciController@kaydet')->name('yonetim.kullanici.kaydet');
    Route::get('/sil/{id}', 'KullaniciController@sil')->name('yonetim.kullanici.sil');


});
