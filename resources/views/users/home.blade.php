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
            <div class="tips">
                <div class="tips-box">
                    <p>Mental Health Tips For You</p>
                    <p>Seek social support: Connect with friends, family, or support groups. Share your feelings and
                        concerns with trusted individuals who can provide a listening ear and offer support. </p>
                </div>
                <div class="tips-teacher">
                    <div class="teacher-frame">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="right-side">
            <img src="assets/img/hero.png" alt="">
        </div>
        <div class="pics">
            <div class="one">
                <img src="" alt="">
                <p>Title</p>
            </div>
            <div class="two">
                <img src="" alt="">
                <p>Title</p>
            </div>
            <div class="three">
                <img src="" alt="">
                <p>Title</p>
            </div>
            <div class="four">
                <img src="" alt="">
                <p>Title</p>
            </div>
        </div>
    </div>
    <div class="about" id="about">


        <div class="first-row">
            <img src="" alt="">
            <div class="first-row-right">
                <div class="first-row-right-top">
                    <p>About Us</p>
                    <p>Lorem ipsum dolor sit amet consectetur. Ornare felis viverra orci nisi. Neque condimentum eu
                        dolor turpis. Tristique donec Lorem ipsum dolor sit amet consectetur. </p>
                </div>
                <div class="first-row-right-bottom">
                    <div class="others">
                        <div class="top">
                            <img src="" alt="">
                            <p>20+ More <br> Pics</p>
                        </div>
                        <button class="others-btn">
                            <span class="label">See Other Pics</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path fill="currentColor"
                                        d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div class="visi">
                        <div class="visi-head">
                            <div class="visi-icons">
                                <iconify-icon icon="map:low-vision-access"></iconify-icon>
                            </div>
                            <p>Our Vision</p>
                        </div>
                        <p class="visi-desk">
                            The vision of our counseling services is the realization of a happy human life through the
                            availability of assistance services in providing developmental support and problem solving
                            so that students develop optimally, independently and happily.
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
                    The primary mission of counseling guidance is to provide assistance and understanding to individuals
                    or groups in overcoming the problems they face. This involves listening with empathy, understanding
                    their situation, and providing relevant and useful advice.
                </p>
            </div>
            <div class="ones">
                <p>Kegiatan Sosial</p>
                <p>Lorem ipsum dolor sit amet consectetur. Ornare felis viverra orci nisi. Neque condimentum eu dolor
                    turpis.</p>
            </div>

            <div class="lasts">
                <div class="lasts-icon">

                </div>
                <div class="lasts-text">
                    <p>Trusted Dah</p>
                    <p>Lorem ipsum dolor sit amet consectetur. Ornare felis viverra orci nisi.</p>
                </div>
            </div>
        </div>
    </div>
    @include('users.layout.slider')
    
    <div class="schedule" id="schedule">
        <p>You Can Scedhule An Appointment From Now On</p>
        <button>
            Scedhule For An Appointment
        </button>
    </div>
    <footer>
        <p class="footer-title">Starbhak Konseling</p>
        <p class="footer-desk">Lorem ipsum dolor sit amet consectetur. Ornare felis viverra orci nisi. Lorem ipsum dolor
            sit amet consectetur. Ornare felis viverra orci nisi. Lorem ipsum dolor sit amet consectetur. Ornare felis
            viverra orci nisi. </p>
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
            <p>© Copyright 2023. All Right Reserved | Sheyla Aulya</p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    

@endsection
