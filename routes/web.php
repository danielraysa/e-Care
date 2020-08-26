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
// Tampilan Depan / Front End
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
//End frontend

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Tampilan Admin / Back end

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dbkonselor', function () {
        return view('backend.konselor.dashboard');
    }); 
    
    //chat
    Route::get('/chat1', function () {
        return view('backend.fitur.chat');
    }); 
    //end chat
    
    //email
    Route::get('/email', function () {
        return view('backend.fitur.email');
    }); 
    
    // Route::get('/kalender', function () {
    //     return view('backend.fitur.kalender');
    // }); 
    //end tabel email
    
    //tabel mahasiswa
    Route::get('/daftarmhs', 'MahasiswaController@index');

    Route::resource('/mahasiswa', 'MahasiswaController');

    Route::get('/tambahmahasiswa', function () {
        return view('backend.konselor.tambahmahasiswa');
    });
    //end tabel mahasiswa


    //tabel konselor
    Route::get('/jadwalkonselor', 'AppointmentController@index_konselor'); 
        
    Route::get('/tambahkonselor', function () {
        return view('backend.konselor.tambahkonselor');
    }); 

    Route::get('/daftarkonselor', 'KonselorController@index');
    Route::resource('/counselor', 'KonselorController');
    
    Route::get('/profilkonselor', function () {
        return view('backend.mhs.profilkonselor');
    });
    //end tabel konselor
    

    //laporan rekam medis
    Route::get('/rekammedis', function () {
        return view('backend.konselor.laprekammedis');
    });

    Route::get('/tambahrekammedis', function () {
        return view('backend.konselor.tambahrekammedis');
    });
    //end rekam medis

    //laporan rekap perbulan
    Route::get('/rekap', function () {
        return view('backend.konselor.laprekapbulan');
    });

    Route::get('/laprekapbulan', function () {
        return view('backend.warek.laprekapperbulan');
    });

    Route::get('/tambahrekapbulan', function () {
        return view('backend.konselor.tambahrekapbulan');
    });
    //end rekap perbulan

    //appointment    
    Route::get('/buatappointment', 'AppointmentController@index');
    // Route::resource('/appointment', 'AppointmentController');
    Route::get('/appointment', 'AppointmentController@index');
    Route::post('/appointment', 'AppointmentController@store');
    Route::post('/appointment/{id}/update', 'AppointmentController@update');
    //end appointment
    
   
   //test mbti 
    Route::get('/tabelmbti', 'MbtiController@index');
    //end test mbti

    //test tingkat kecemasan
    Route::get('/testtingkat', function () {
        return view('backend.mhs.testtingkatmasalah');
    });
    //end tingkat kecemasan
    

    //Data Master

    //tabel role
    Route::get('/tabelrole', 'RolesController@index');

    Route::get('/tambahrole', function () {
        return view('backend.datamaster.tambahrole');
    });
    //end tabel role

    
    //tabel program studi
    Route::get('/tabelprodi', 'MajorsController@index');
    ///INI ROUTENYA
    // Route::get('/tambahkaryawan', 'KaryawanController@roleindex'); 

    Route::get('/tambahprodi', function () {
        return view('backend.datamaster.tambahprodi');
    });
    //end tabel program studi

    //tabel mbti
  
    Route::get('/testmbti', 'MbtiController@dropdownindex');

    Route::get('/tambahmbti', function () {
        return view('backend.datamaster.tambahmbti');
    });
    //end tabel mbti

  
    //tabel pertanyaan
    Route::get('/tabelpertanyaan', function () {
        return view('backend.datamaster.pertanyaan');
    });

    Route::get('/tambahpertanyaan', function () {
        return view('backend.datamaster.tambahpertanyaan');
    });
    //end tabel pertanyaan


    //tabel karyawan
    Route::get('/tabelkaryawan', function () {
        return view('backend.datamaster.karyawan');
    });
    Route::get('/tabelkaryawan', 'KaryawanController@index');

    Route::get('/tambahkaryawan', function () {
        return view('backend.datamaster.tambahkaryawan');
    });
    //endtabel karyawan


    //forum
    Route::get('/forum', function () {
        return view('backend.fitur.forum');
    });

    //endforum

    
    //chat
    Route::resource('notification', 'NotificationController');

    Route::resource('/user', 'UserController');
    Route::resource('/chat', 'ChatController');
    
    Route::get('/kuis', 'AppointmentController@kirimemail');
    Route::resource('pertanyaan', 'QuestionController');
    
    Route::get('/tes-chat', 'MessageController@listchat');
    Route::get('/tes-chat/{id}', 'MessageController@listmessage');
    Route::post('/tes-chat', 'MessageController@teschat');

    //endchat
});