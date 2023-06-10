<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Starbhak Konseling</title>
    <link rel="stylesheet" href="assets/css/home.css">

    {{-- Fonts - Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- iconify --}}
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-toggle {
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
    }

    .dropdown-content {
        padding: 0px;
        right: 10%;
        top: -1%
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown.open .dropdown-content {
        display: block;
    }

    .desc {
        padding: 15px;
        text-align: center;
    }

    ul {
        list-style-type: none;
    }
</style>

<body>
    <nav>
        <div class="navbar">

            <div class="logo">
                <img src="assets/img/logoTb.png" alt="">
                <p>Starbhak Konseling</p>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#teachers">Teachers</a></li>
                    <li><a href="#schedule">Schedule</a></li>
                </ul>
            </div>
            @if (Auth::check())
            <div class="dropdown">
                @if (Auth::user()->hasRole('admin')||Auth::user()->hasRole('siswa'))
                <button class="dropdown-toggle" id="dropdownButton">
                    <div class="avatar" style="border-radius: 100%">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt class="w-px-40 h-auto rounded-circle"
                            style="border-radius: 100%; width: 42px; border: 5px solid #72a9e9" />
                    </div>
                </button>
                @else
                <button class="dropdown-toggle" id="dropdownButton">
                    <div class="avatar" style="border-radius: 100%">
                        <img src="{{ asset('storage/profile-photos') }}/{{ Auth::user()->profile_photo_path }}" alt class="w-px-40 h-auto rounded-circle"
                            style="border-radius: 100%; width: 42px; border: 5px solid #72a9e9" />
                    </div>
                </button>
                @endif
                <div class="dropdown-content" style="border-radius: 7px;">
                        <div style="margin: 10px 15px"><a style="text-decoration: none; color: black; display: flex; align-items: center; gap: 10px" class="dropdown-item setting" href="{{ url('setting') }}">Profile <iconify-icon icon="solar:user-bold" style="font-size: 20px; color: grey;"></iconify-icon>
                        </a></div>
                        @if (Auth::user()->hasRole('admin')||Auth::user()->hasRole('guru_bk')||Auth::user()->hasRole('wali_kelas'))
                        <div style="margin: 10px 15px"><a style="text-decoration: none; color: black; display: flex; align-items: center; gap: 10px" class="dropdown-item setting" href="{{ url('dashboard') }}">Dashboard 
                            {{-- <iconify-icon icon="solar:user-bold" style="font-size: 20px; color: grey;"></iconify-icon> --}}
                        </a></div>
                        @endif
                        <div>
                            <hr class="dropdown-divider">
                        </div>
                        <div style="margin: 10px 15px">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            
                                <button type="submit" class="dropdown-item" style="background-color: transparent; border:none; padding: 0px; color: red; display: flex; align-items: center; gap: 10px" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <span class="align-middle" style="font-size: 16px">Log Out</span>
                                    <iconify-icon icon="ic:round-logout" style="font-size: 20px; color: red;"></iconify-icon>
                                </button>
                            </form>
                        </div>
                </div>
            </div>

            @else
            <div class="login">
                <a href="/login">
                    <button class="cta">
                        <span>Login Now</span>
                        <svg viewBox="0 0 13 10" height="10px" width="15px">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                    </button>
                </a>
            </div>
            @endif
        </div>
    </nav>
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
    <div class="teachers" id="teachers">
        <div class="teacher-left">
            <div class="pict">
                <img src="" alt="">
            </div>
        </div>
        <div class="teacher-right">
            <p class="teacherttl">
                Meet Our Qualified Teacher
            </p>

            <p class="teachername">
                Mrs. Sheila Riani P S.Pst
            </p>
            <p class="teacherdesc">
                Lorem ipsum dolor sit amet consectetur. Ornare felis viverra orci nisi. Neque condimentum eu dolor
                turpis. Tristique donec Lorem ipsum dolor sit amet consectetur. Ornare felis viverra orci nisi. Neque
                condimentum eu dolor turpis. Tristique donec
                Lorem ipsum dolor sit amet consectetur
            </p>
        </div>
        <div class="next">
            <button>
                <iconify-icon icon="ic:round-navigate-next"></iconify-icon>
            </button>
        </div>
    </div>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var dropdown = document.querySelector(".dropdown");
            var dropdownContent = dropdown.querySelector(".dropdown-content");
            var dropdownToggle = dropdown.querySelector(".dropdown-toggle");

            dropdownToggle.addEventListener("click", function () {
                dropdown.classList.toggle("open");
            });

            document.addEventListener("click", function (event) {
                if (!dropdown.contains(event.target)) {
                    dropdown.classList.remove("open");
                }
            });
        });
    </script>

</body>

</html>