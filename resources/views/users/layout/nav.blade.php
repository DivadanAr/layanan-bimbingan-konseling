
<nav>
    <div class="navbar">
        <div class="logo">
            <img src="assets/img/logoTb.png" alt="">
            <p>Starbhak Konseling</p>
        </div>
        @if (Request::is('siswas') || ('private-view'))
      
        @else
        <div class="menu">
            <ul>
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#teachers">Teachers</a></li>
                <li><a href="#schedule">Schedule</a></li>
            </ul>
        </div>
        @endif
        
        @if (Auth::check())
        <div class="avatar" style="border-radius: 100%">
            <img src="{{ Auth::user()->profile_photo_url }}" alt
                class="w-px-40 h-auto rounded-circle" style="border-radius: 100%; width: 42px; border: 5px solid #72a9e9"/>
        </div>
        @else
        <div class="login">
            <a href="">
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