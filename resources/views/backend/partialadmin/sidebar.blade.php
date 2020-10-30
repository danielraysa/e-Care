
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}"><a href="{{ url('home') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard Hospital">Dashboard</span></a>
                </li>
                <li class="navigation-header"><span data-i18n="Professional">Professional</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Professional"></i>
                </li>

                @if(in_array(Auth::user()->role_id, [1, 2, 4]))
                {{-- <li class="nav-item"><a href="{{url('/buatappointment')}}"><i class="la la-edit"></i><span class="menu-title" data-i18n="Appointment">Buat Appointment</span></a> 
                </li>
                <li class="nav-item"><a href="#"><i class="la la-edit"></i><span class="menu-title" data-i18n="Appointment">Appointment</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item {{ Request::is('appointment') ? 'active' : '' }}" href="{{url('appointment')}}"><i></i><span>Buat Appointment</span></a>
                        </li>
                        <li><a class="menu-item {{ Request::is('jadwalkonselor') ? 'active' : '' }}" href="{{url('jadwalkonselor')}}"><i></i><span>Tabel Form Pendaftaran</span></a>
                        </li>
                       
                    </ul>
                </li> --}}
                <li class="nav-item {{ Request::is('testmbti') || Request::is('testtingkat') ? 'open' : '' }}"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="Patients">@if(Auth::user()->role_id == 2) Test @else Hasil Test Mahasiswa @endif</span></a>
                    <ul class="menu-content">
                        <li class="{{ Request::is('testmbti') ? 'active' : '' }}"><a class="menu-item" href="{{route('testmbti.index')}}"><i></i><span>Kepribadian/MBTI</span></a>
                        </li>
                        <li class="{{ Request::is('testtingkat') ? 'active' : '' }}"><a class="menu-item" href="{{route('testtingkat.index')}}"><i></i><span>Tingkat Masalah</span></a>
                        </li>
                    </ul>
                </li>
                @endif
             
                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 4)
                <li class="nav-item {{ Request::is('jadwalkonselor') ? 'active' : '' }}"><a href="{{url('jadwalkonselor')}}"><i class="la la-edit"></i><span class="menu-title" data-i18n="Appointment">Tabel Konseling</span></a>
                </li>
                @endif


                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 4)
                <li class="nav-item {{ Request::is('chat') ? 'active' : '' }}"><a href="{{ route('chat') }}"><i class="la la-comments"></i><span class="menu-title" data-i18n="Chat">Chat</span></a>
                </li>
                @if(Auth::user()->role_id == 2)
                <li class="nav-item {{ Request::is('histori-chat') ? 'active' : '' }}"><a href="{{ route('histori-chat') }}"><i class="la la-comments"></i><span class="menu-title" data-i18n="Chat">Histori Chat</span></a>
                </li>
                @endif
                @endif

                {{-- @if(Auth::user()->role_id == 1)
                <li class="nav-item"><a href="#"><i class="la la-stethoscope"></i><span class="menu-title" data-i18n="Doctors">Konselor</span></a>
                    <ul class="menu-content">
                        <li class="{{ Request::is('counselor') ? 'active' : '' }}"><a class="menu-item" href="{{url('counselor')}}"><i></i><span>Tabel Konselor</span></a>
                        </li>
                
                    </ul>
                </li>
                @endif --}}

                {{-- @if(Auth::user()->role_id == 4 || Auth::user()->role_id == 1) --}}
                {{-- <li class="nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="Patients">Mahasiswa</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{url('daftarmhs')}}"><i></i><span>Tabel Mahasiswa</span></a>
                        </li>
                      
                    </ul>
                </li>
                <li class="nav-item"><a href="#"><i class="la la-bar-chart"></i><span class="menu-title" data-i18n="Report">Laporan</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{url('rekammedis')}}"><i></i><span>Rekam Medis</span></a>
                        </li>
                        <li><a class="menu-item" href="{{url('rekap')}}"><i></i><span>Rekap Bulanan</span></a>
                        </li>
                    </ul>
                </li> --}}
                @if(Auth::user()->role_id == 1)
                <li class="nav-item"><a href="#"><i class="la la-stethoscope"></i><span class="menu-title" data-i18n="Doctors">Data Master</span></a>
                    <ul class="menu-content">
                        <li class=""><a class="menu-item" href="{{url('tabelkaryawan')}}"><i></i><span>Tabel Karyawan</span></a>
                        </li>
                        <li><a class="menu-item" href="{{url('daftarmhs')}}"><i></i><span>Tabel Mahasiswa</span></a>
                        </li>
                        <li class=""><a class="menu-item" href="{{url('tabelrole')}}"><i></i><span>Tabel Role</span></a>
                        </li>
                        <li class=""><a class="menu-item" href="{{url('tabelprodi')}}"><i></i><span>Tabel Program Studi</span></a>
                        </li>
                        <li class=""><a class="menu-item" href="{{url('tabelmbti')}}"><i></i><span>Tabel MBTI</span></a>
                        </li>
                        <li class=""><a class="menu-item" href="{{url('pertanyaan')}}"><i></i><span>Tabel Pertanyaan Kecemasan</span></a>
                        </li>
                        <!-- <li class=""><a class="menu-item" href="{{url('profilkonselor')}}"><i></i><span>Profil Konselor</span></a>
                        </li> -->
                    </ul>
                </li>
                @endif
                {{-- @endif --}}

                @if(Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
                <li class="nav-item {{ Request::is('rekammedis') ? 'active' : '' }}"><a href="{{url('rekammedis')}}"><i class="la la-bar-chart"></i><span class="menu-title" data-i18n="Appointment">Rekam Medis</span></a>
                </li>
                @endif

                {{-- @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 1 || Auth::user()->role_id == 4) --}}
                @if(Auth::user()->role_id == 3)
                <li class="nav-item {{ Request::is('rekapbulanan') ? 'active' : '' }}"><a href="{{url('rekapbulanan')}}"><i class="la la-bar-chart"></i><span class="menu-title" data-i18n="Appointment">Laporan Rekap Perbulan</span></a>
                </li>
                @endif
            
               
                @if(Auth::user()->role_id == 1)
                <li><a class="menu-item {{ Request::is('user') ? 'active' : '' }}" href="{{ route('user.index') }}"><i class="la la-link"></i><span>Link User</span></a></li> 
                <!-- <li><a class="menu-item" href="{{url('pertanyaan')}}"><i class="la la-question"></i><span>Pertanyaan</span></a></li>  -->
                @endif
        
                {{--  <li class=" navigation-header"><span data-i18n="Apps">Apps</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i>
                </li>
                <li class="nav-item"><a href="{{url('email')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="Inbox">Inbox</span></a>
                </li> --}}

                @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 4 || Auth::user()->role_id == 1)
                <li class="nav-item {{ Request::is('forum-group') ? 'active' : '' }}"><a href="{{ route('forum-group.index')}}"><i class="la la-users"></i><span class="menu-title" data-i18n="Patients">Forum Diskusi</span></a>
                </li>
               @endif
              
            </ul>
        </div>
    </div>