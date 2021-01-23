<header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a href="{{ url('/') }}"> <img src="{{asset('assets/img/stikom.png')}}" width="50px" alt=""> </a><a href="{{ url('home') }}"> <img src="{{asset('assets/img/logo_footer.png')}}" width="120px" alt=""> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{url('/')}}">Home</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('konselor')}}">Konselor</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('kuis') }}">Tes & Kuis</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('forum') }}">Forum</a>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Forum
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                    </div>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('kontak') }}">Kontak</a>
                                </li>
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="{{ url('login') }}">Login</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>