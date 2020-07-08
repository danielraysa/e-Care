
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="active"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard Hospital">Dashboard Hospital</span></a>
                </li>
                <li class=" navigation-header"><span data-i18n="Professional">Professional</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Professional"></i>
                </li>
                @if(Auth::user()->role_id == 2)
                <li class=" nav-item"><a href="#"><i class="la la-edit"></i><span class="menu-title" data-i18n="Appointment">Appointment</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{url('/appointment')}}"><i></i><span>Buat Appointment</span></a>
                        </li>
                        <li><a class="menu-item" href="{{url('jadwalkonselor')}}"><i></i><span>Tabel Form Pendaftaran</span></a>
                        </li>
                       
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="Patients">Test</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{url('testmbti')}}"><i></i><span>Kepribadian/MBTI</span></a>
                        </li>
                        <li><a class="menu-item" href="{{url('testtingkat')}}"><i></i><span>Tingkat Masalah</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                <li class=" nav-item"><a href="#"><i class="la la-stethoscope"></i><span class="menu-title" data-i18n="Doctors">Konselor</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{url('daftarkonselor')}}"><i></i><span>Daftar Konselor</span></a>
                        </li>
                        @if(Auth::user()->role_id == 1)
                        <li><a class="menu-item" href="{{url('counselor')}}"><i></i><span>Tambah Konselor</span></a>
                        </li>
                        @endif
                        <li><a class="menu-item" href="{{url('profilkonselor')}}"><i></i><span>Profil Konselor</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
                <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="Patients">Mahasiswa</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{url('daftarmhs')}}"><i></i><span>Daftar Mahasiswa</span></a>
                        </li>
                        <li><a class="menu-item" href="hospital-add-patient.html"><i></i><span>Tambah Mahasiswa</span></a>
                        </li>
                        <li><a class="menu-item" href="{{url('profilmhs')}}"><i></i><span>Profil Mahasiswa</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-bar-chart"></i><span class="menu-title" data-i18n="Report">Laporan</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{url('rekammedis')}}"><i></i><span>Rekam Medis</span></a>
                        </li>
                        <li><a class="menu-item" href="{{url('rekap')}}"><i></i><span>Rekap Bulanan</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(Auth::user()->role_id == 3)
                <li><a class="menu-item" href="{{url('rekap')}}"><i class="la la-bar-chart"></i><span>Rekap Bulanan</span></a>
                </li>
                @endif
                @if(Auth::user()->role_id == 1)
                <li><a class="menu-item" href="{{url('user')}}"><i class="la la-link"></i><span>Link User</span></a>
                </li>   
                @endif
        
                <li class=" navigation-header"><span data-i18n="Apps">Apps</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i>
                </li>
                <li class=" nav-item"><a href="{{url('email')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="Inbox">Inbox</span></a>
                </li>
                <li class=" nav-item"><a href="{{url('chat1')}}"><i class="la la-comments"></i><span class="menu-title" data-i18n="Chat">Chat</span></a>
                </li>
               
              
            </ul>
        </div>
    </div>