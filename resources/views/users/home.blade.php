@extends('users.layout.app')
@section('css')
<link rel="stylesheet" href="assets/css/home.css">
@endsection
@section('content')

<body>
    <div class="hero" id="hero">
        <div class="left-side">
            <div class="left-hero-text">
                <p class="title">Our Quality Ask To Be Different</p>
                <p class="desk">We Serve Solutions to all your problems </p>
            </div>
            @if (Auth::check())
            <div class="tips">
                <div class="tips-box">
                    <p>Motivation Quotes For You</p>
                    @if (!empty($quotes->quotes))
                    <p>{{$quotes->quotes}}</p>
                    @else
                    <p>No quotes available</p>
                    @endif
                </div>
                <div class="tips-teacher">
                    <div class="teacher-frame">
                        @if (!empty($quotes->guru_bk->nama))
                        @if (strcmp($quotes->guru_bk->nama, 'Kasandra Fitriyani') === 0)
                        <img src="assets/img/guruBK/kasandra.png" alt="">
                        @elseif (strcmp($quotes->guru_bk->nama, 'Sheila Riani Putri') === 0)
                        <img src="assets/img/guruBK/sheila.png" alt="">
                        @elseif (strcmp($quotes->guru_bk->nama, 'Ricky Sudrajad') === 0)
                        <img src="assets/img/guruBK/ricky.jpg" alt="">
                        @elseif (strcmp($quotes->guru_bk->nama, 'Ika Rafika') === 0)
                        <img src="assets/img/guruBK/fika.png" alt="">
                        @elseif (strcmp($quotes->guru_bk->nama, 'Nadya Afriliani') === 0)
                        <img src="assets/img/guruBK/nadia.png" alt="">
                        @elseif (strcmp($quotes->guru_bk->nama, 'Heni Siswanti') === 0)
                        <img src="assets/img/guruBK/heni.jpg" alt="">
                        @else
                        <img src="assets/img/user.png" alt="">
                        @endif
                        @else
                        <img src="assets/img/user.png" alt="">
                        @endif
                    </div>
                </div>
            </div>

            @else
             <div class="tips">
                <div class="tips-box">
                    <p>Motivation Quotes For You</p>
                    @if (!empty($quotes->quotes))
                    <p>{{$quotes->quotes}}</p>
                    @else
                    <p>No quotes available</p>
                    @endif
                </div>
                <div class="tips-teacher">
                    <div class="teacher-frame">
                        @if (!empty($quotes->guru_bk->nama))
                        @if (strcmp($quotes->guru_bk->nama, 'Kasandra Fitriyani') === 0)
                        <img src="assets/img/guruBK/kasandra.png" alt="">
                        @elseif (strcmp($quotes->guru_bk->nama, 'Sheila Riani Putri') === 0)
                        <img src="assets/img/guruBK/sheila.png" alt="">
                        @elseif (strcmp($quotes->guru_bk->nama, 'Ricky Sudrajad') === 0)
                        <img src="assets/img/guruBK/ricky.jpg" alt="">
                        @elseif (strcmp($quotes->guru_bk->nama, 'Ika Rafika') === 0)
                        <img src="assets/img/guruBK/fika.png" alt="">
                        @elseif (strcmp($quotes->guru_bk->nama, 'Nadya Afriliani') === 0)
                        <img src="assets/img/guruBK/nadia.png" alt="">
                        @elseif (strcmp($quotes->guru_bk->nama, 'Heni Siswanti') === 0)
                        <img src="assets/img/guruBK/heni.jpg" alt="">
                        @else
                        <img src="assets/img/user.png" alt="">
                        @endif
                        @else
                        <img src="assets/img/user.png" alt="">
                        @endif
                    </div>
                </div>
            </div>

            @endif
        </div>




        <div class="right-side">
            <img src="assets/img/hero.png" alt="">
        </div>
        <div class="pics">
            <div class="one">
                <img src="assets/img/ldks.JPG" alt="">
                <p>LDKS 2023</p>
            </div>
            <div class="two">
                <img src="assets/img/kegiatansosial.jpg" alt="">
                <p>Socialization</p>
            </div>
            <div class="three">
                <img src="assets/img/bimbingankelas.jpg" alt="">
                <p>Weekly Conseling</p>
            </div>
            <div class="four">
                <img src="assets/img/sharingmateri.jpg" alt="">
                <p>Sharing Experience</p>
            </div>
        </div>
    </div>
    <div class="about" id="about" data-aos="fade-up">
        <div class="first-row">
            <img src="assets/img/kegiatanorganisasi.jpg" alt="">
            <div class="first-row-right">
                <div class="first-row-right-top">
                    <p>About Us</p>
                    <p>We are a counseling service that provides people with the direction and assistance they need to
                        succeed. Maximize your potential and our dedicated team's support to get through challenges in
                        school.</p>
                </div>
                <div class="first-row-right-bottom">
                    <div class="others">
                        <div class="top">
                            <div class="top-img">

                                <img src="assets/img/logoTb.png" alt="">
                            </div>
                            <p>Taruna Bhakti <br>
                                <span>
                                    Conseling Program
                                </span>
                            </p>
                        </div>
                        {{-- <button class="others-btn">
                            <span class="label">See Other Pics</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path fill="currentColor"
                                        d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z">
                                    </path>
                                </svg>
                            </span>
                        </button> --}}
                    </div>
                    <div class="visi">
                        <div class="visi-head">
                            <div class="visi-icons">
                                <iconify-icon icon="map:low-vision-access"></iconify-icon>
                            </div>
                            <p>Our Vision</p>
                        </div>
                        <p class="visi-desk">
                            Assisting students to reach their full potential and flourish academically by providing
                            all-encompassing counseling and guidance services.
                            provide students with the professional advice and support that is required to make educated
                            decisions concerning their academic and career prospects.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="misi">
                <div class="misi-head">
                    <div class="misi-icons">
                        <iconify-icon icon="icon-park-solid:user-to-user-transmission"></iconify-icon>
                    </div>
                    <p>Our Mision</p>
                </div>
                <p class="misi-desk">
                    To offer inclusive guidance and counseling facilities that respond to each student's specific needs
                    in order to support their achievement and general well-being.
                    to work together with parents, teachers, and the rest of the educational environment to build a
                    strong system of support that supports children' academic, social, and emotional development.
                </p>
            </div>
            <div class="ones">
                <p>With 4 Kind Of Conseling</p>
                <p>We provide 4 kind of conseling, which are Private conseling, Study Conseling, Social Conseling and
                    Career Conseling</p>
            </div>

            <div class="lasts">
                <div class="lasts-icon">
                    <iconify-icon icon="mingcute:safety-certificate-fill"></iconify-icon>
                </div>
                <div class="lasts-text">
                    <p>Safety Guaranteed</p>
                    <p>We guarantee your secret will be safe with us</p>
                </div>
            </div>
        </div>
    </div>
    <div class="" data-aos="fade-up">
        @include('users.layout.slider')
    </div>


    <div class="schedule" id="schedule">
        <p>You Can Scedhule An Appointment From Now On</p>


        @if (Auth::check())
        @if (Auth::user()->hasRole('admin')||Auth::user()->hasRole('guru_bk')||Auth::user()->hasRole('wali_kelas'))
        <a href="/">
            <button disabled>
                Scedhule For An Appointment
            </button>
        </a>
        @elseif (Auth::user()->hasRole('siswa'))
        <a href="/siswas">
            <button>
                Scedhule For An Appointment
            </button>
        </a>
        @endif
        @else
        <a href="/home">
            <button>
                Scedhule For An Appointment
            </button>
        </a>
        @endif

    </div>
    <footer>
        <p class="footer-title">Starbhak Konseling</p>
        <p class="footer-desk">Empowering students with expert guidance and counsel for improvements in the future. We
            promote their improvement, wellbeing, and success together. </p>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Teachers</a></li>
            <li><a href="">Book Scedhule</a></li>
        </ul>
        <ul>
            <li>
                <a href="https://smktarunabhakti.net/">
                    <div class="web">
                        <iconify-icon icon="mdi:web"></iconify-icon>
                    </div>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/starbhak.official/">
                    <div class="ig">
                        <iconify-icon icon="ri:instagram-fill"></iconify-icon>
                    </div>
                </a>

            </li>
            <li>
                <a href="https://web.facebook.com/smktarunabhaktidepok">
                    <div class="fb">
                        <iconify-icon icon="ri:facebook-fill"></iconify-icon>
                    </div>
                </a>
            </li>
            <li>
                <a href="https://www.youtube.com/@SMKTarunaBhaktiDepok">
                    <div class="youtube">
                        <iconify-icon icon="mingcute:youtube-fill"></iconify-icon>
                    </div>
                </a>
            </li>
            <li>
                <a href="https://www.tiktok.com/@starbhak.official">
                    <div class="tiktok">
                        <iconify-icon icon="ic:outline-tiktok"></iconify-icon>
                    </div>
                </a>

            </li>
        </ul>
        <div class="lines"></div>
        <div class="copyright">
            <p>© Copyright 2023. All Right Reserved </p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

    </script>



    @endsection
