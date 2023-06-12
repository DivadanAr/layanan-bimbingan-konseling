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
                  
                    @if (Auth::user()->hasRole('admin')||Auth::user()->hasRole('guru_bk')||Auth::user()->hasRole('wali_kelas'))
                    <div style="margin: 10px 15px"><a style="text-decoration: none; color: black; display: flex; align-items: center; gap: 10px" class="dropdown-item setting" href="{{ url('dashboard') }}">Dashboard 
                        {{-- <iconify-icon icon="solar:user-bold" style="font-size: 20px; color: grey;"></iconify-icon> --}}
                    </a></div>
                    @elseif(Auth::user()->hasRole('siswa'))
                    <div style="margin: 10px 15px"><a style="text-decoration: none; color: black; display: flex; align-items: center; gap: 10px" class="dropdown-item setting" href="{{ url('siswas') }}">Profile <iconify-icon icon="solar:user-bold" style="font-size: 20px; color: grey;"></iconify-icon>
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