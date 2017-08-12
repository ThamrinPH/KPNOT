<?php



Route::group(['middleware' => ['web']], function () {
    
    Route::get('/', 'FrontController@home')->name('index');

//auth
    Route::get('/login', 'FrontController@login')->name('login');
    Route::post('/login', 'FrontController@login_post')->name('login_post');
    Route::get('/logout', 'FrontController@logout')->name('logout');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', 'FrontController@dashboard')->name('dashboard');
        
//jadwal
        Route::get('/jadwal/', 'FrontController@jadwal_list')->name('jadwal_list');
        Route::get('/jadwal/calendar', 'FrontController@jadwal_calendar')->name('jadwal_calendar');
        Route::get('/jadwal/{id}', 'FrontController@jadwal_createEdit')->name('jadwal_createEdit');
        Route::post('/jadwal/save', 'FrontController@jadwal_save')->name('jadwal_save');
        Route::get('/jadwal/del/{id}','FrontController@jadwal_del')->name('jadwal_del');
        Route::post('/jadwal/set', 'FrontController@jadwal_set')->name('jadwal_set');

//klien
        Route::get('/klien/', 'FrontController@klien_list')->name('klien_list');
        Route::get('/klien/{id}', 'FrontController@klien_createEdit')->name('klien_createEdit');
        Route::post('/klien/save', 'FrontController@klien_save')->name('klien_save');
        Route::post('/klien/set', 'FrontController@klien_set')->name('klien_set');

//legal
        Route::get('/legal/', 'FrontController@legal_list')->name('legal_list');
        Route::get('/legal/{id}', 'FrontController@legal_createEdit')->name('legal_createEdit');
        Route::post('/legal/save', 'FrontController@legal_save')->name('legal_save');
        Route::get('/legal/download/{lampiran}','FrontController@download_legal')->name('legal_download');
        Route::post('/legal/set', 'FrontController@legal_set')->name('legal_set');

//notariil
        Route::get('/notariil/', 'FrontController@notariil_list')->name('notariil_list');
        Route::get('/notariil/{id}', 'FrontController@notariil_createEdit')->name('notariil_createEdit');
        Route::post('/notariil/save', 'FrontController@notariil_save')->name('notariil_save');
        Route::get('/notariil/download/{lampiran}','FrontController@download_notariil')->name('notariil_download');
        Route::post('/notariil/set', 'FrontController@notariil_set')->name('notariil_set');

//ppat
        Route::get('/ppat', 'FrontController@ppat_list')->name('ppat_list');
        Route::get('/ppat/{id}', 'FrontController@ppat_createEdit')->name('ppat_createEdit');
        Route::post('/ppat/save', 'FrontController@ppat_save')->name('ppat_save');
        Route::get('/ppat/download/{lampiran}','FrontController@download_ppat')->name('ppat_download');
        Route::post('/ppat/set', 'FrontController@ppat_set')->name('ppat_set');

//properti
        Route::get('/properti/', 'FrontController@properti_list')->name('properti_list');
        Route::get('/properti/{id}', 'FrontController@properti_createEdit')->name('properti_createEdit');
        Route::post('/properti/save', 'FrontController@properti_save')->name('properti_save');
        Route::get('/properti/download/{lampiran}','FrontController@download_properti')->name('properti_download');
        Route::post('/properti/set', 'FrontController@properti_set')->name('properti_set');


//retribusi
        Route::get('/retribusi/', 'FrontController@retribusi_list')->name('retribusi_list');
        Route::get('/retribusi/details', 'FrontController@retribusi_detail')->name('retribusi_detail');
        Route::get('/retribusi/{id}', 'FrontController@retribusi_createEdit')->name('retribusi_createEdit');
        Route::post('/retribusi/save', 'FrontController@retribusi_save')->name('retribusi_save');
        Route::get('/retribusi/download/{lampiran}','FrontController@download_retribusi')->name('retribusi_download');
        Route::post('/retribusi/set', 'FrontController@retribusi_set')->name('retribusi_set');

//sk
        Route::get('/sk/', 'FrontController@sk_list')->name('sk_list');
        Route::get('/sk/{id}', 'FrontController@sk_createEdit')->name('sk_createEdit');
        Route::get('/sk/details/{id}', 'FrontController@sk_details')->name('sk_details');
        Route::post('/sk/save', 'FrontController@sk_save')->name('sk_save');
        Route::post('/sk/set', 'FrontController@sk_set')->name('sk_set');

//transaksi
        Route::get('/transaksi/', 'FrontController@transaksi_list')->name('transaksi_list');
        Route::get('/transaksi/details', 'FrontController@transaksi_detail')->name('transaksi_detail');
        Route::get('/transaksi/{id}', 'FrontController@transaksi_createEdit')->name('transaksi_createEdit');
        Route::post('/transaksi/save', 'FrontController@transaksi_save')->name('transaksi_save');
        Route::get('/transaksi/download/{lampiran}','FrontController@download_transaksi')->name('transaksi_download');
        Route::post('/transaksi/set', 'FrontController@transaksi_set')->name('transaksi_set');

//user
        Route::get('/user/', 'FrontController@user_list')->name('user_list');
        Route::get('/user/{id}', 'FrontController@user_createEdit')->name('user_createEdit');
        Route::post('/user/save', 'FrontController@user_save')->name('user_save');
        Route::post('/user/set', 'FrontController@user_set')->name('user_set');

//warmerken
        Route::get('/warmerken/', 'FrontController@warmerken_list')->name('warmerken_list');
        Route::get('/warmerken/{id}', 'FrontController@warmerken_createEdit')->name('warmerken_createEdit');
        Route::post('/warmerken/save', 'FrontController@warmerken_save')->name('warmerken_save');
        Route::get('/warmerken/download/{lampiran}','FrontController@download_warmerken')->name('warmerken_download');
        Route::post('/warmerken/set', 'FrontController@warmerken_set')->name('warmerken_set');

//Laporan
        Route::get('/revenue','FrontController@revenue')->name('revenue');
    });
});
