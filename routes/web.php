<?php

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
    return view('front.home');
});

Route::get('/konselor', function () {
    return view('front.konselor');
});

Route::get('/forum', function () {
    return view('front.forum');
});

Route::get('/forumdetail', function () {
    return view('front.forumdetail');
});

Route::get('/kontak', function () {
    return view('front.kontak');
});

Route::get('/kuis', function () {
    return view('front.kuis');
});

// Route::get('/login1', function () {
//     return view('front.login');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dbkonselor', function () {
        return view('backend.konselor.dashboard');
    }); 
    
    //BACK END
    Route::get('/chat1', function () {
        return view('backend.fitur.chat');
    }); 
    
    Route::get('/email', function () {
        return view('backend.fitur.email');
    }); 
    
    Route::get('/kalender', function () {
        return view('backend.fitur.kalender');
    }); 
    
    Route::get('/daftarmhs', 'MahasiswaController@index');

    Route::resource('/mahasiswa', 'MahasiswaController'); 
    
    Route::get('/jadwalkonselor', 'AppointmentController@index_konselor'); 
    
    Route::get('/profilmhs', function () {
        return view('backend.konselor.profilmhs');
    }); 
    
    Route::get('/tambahkonselor', function () {
        return view('backend.konselor.tambahkonselor');
    }); 
    
    
    Route::get('/rekammedis', function () {
        return view('backend.konselor.laprekammedis');
    });
    
    Route::get('/rekap', function () {
        return view('backend.konselor.laprekapbulan');
    });
    
    Route::get('/buatappointment', 'AppointmentController@index');
    Route::resource('/appointment', 'AppointmentController');
    
    Route::get('/daftarkonselor', 'KonselorController@index');
    Route::resource('/counselor', 'KonselorController');
    
    Route::get('/profilkonselor', function () {
        return view('backend.mhs.profilkonselor');
    });
    
    Route::get('/testmbti', function () {
        return view('backend.mhs.testmbti');
    });
     
    Route::get('/testtingkat', function () {
        return view('backend.mhs.testtingkatmasalah');
    });
    
    Route::get('/laprekapbulan', function () {
        return view('backend.warek.laprekapperbulan');
    });

    Route::get('/tambahmahasiswa', function () {
        return view('backend.konselor.tambahmahasiswa');
    });

    Route::get('/tambahrekammedis', function () {
        return view('backend.konselor.tambahrekammedis');
    });

    Route::get('/tambahrekapbulan', function () {
        return view('backend.konselor.tambahrekapbulan');
    });

    //Data Master
   

    Route::get('/tabelrole', 'RolesController@index');

    Route::get('/tambahrole', function () {
        return view('backend.datamaster.tambahrole');
    });

    


    Route::get('/tabelprodi', 'MajorsController@index');

    Route::get('/tambahprodi', function () {
        return view('backend.datamaster.tambahprodi');
    });

    Route::get('/tabelmbti', 'MbtiController@index');

    Route::get('/tambahmbti', function () {
        return view('backend.datamaster.tambahmbti');
    });
  

    Route::get('/tabelpertanyaan', function () {
        return view('backend.datamaster.pertanyaan');
    });

    Route::get('/tambahpertanyaan', function () {
        return view('backend.datamaster.tambahpertanyaan');
    });


    Route::get('/tabelkaryawan', function () {
        return view('backend.datamaster.karyawan');
    });

    Route::get('/tambahkaryawan', function () {
        return view('backend.datamaster.tambahkaryawan');
    });


    
    Route::resource('notification', 'NotificationController');

    Route::resource('/user', 'UserController');
    Route::resource('/chat', 'ChatController');
    /* Route::post('/chat/send', 'ChatController@sendMessage');
    Route::post('/chat/{user}/send', 'ChatController@sendMessagePrivate');
    Route::get('/get-users', 'ChatController@getUsers');
    
    Route::get('/chats', 'ChatsController@index');
    Route::get('messages', 'ChatController@fetchMessages');
    Route::post('messages', 'ChatController@sendMessage');
    Route::get('messages/{user}', 'ChatController@privateMessages');
    Route::post('messages/{user}', 'ChatController@sendPrivateMessage'); */
    
    Route::get('/tes-chat', 'MessageController@listchat');
    Route::get('/tes-chat/{id}', 'MessageController@listmessage');
    Route::post('/tes-chat', 'MessageController@teschat');
});