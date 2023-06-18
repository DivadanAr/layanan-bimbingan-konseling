<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/signin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- iconify --}}
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>
<body>
    <div class="container">
  <div class="left-side">
    <div class="carousell">
        <div class="wrapper">
            <img src="assets/img/slide1.png" alt="">
            <img src="assets/img/slide2.png" alt="">
            <img src="assets/img/slide3.png" alt="">
            <img src="assets/img/slide1.png" alt="">


        </div>
    </div>
        
    </div>
<div class="right-side">
    <form method="POST" action="{{ route('login') }}">
@csrf
<div class="signin-box">
    <div class="signin-header">
        <p>Sign In</p>
        <p>Sign in to your account now !</p>
    </div>
    <div class="signin-content">
        <div class="id">
            <p>Email/Name/NISN</p>
            <div class="id-input">
                <iconify-icon icon="mdi:person"></iconify-icon>
                <input type="text" id="auth" placeholder="Input your email/name/NISN" name="auth" :value="old('auth')" required autofocus autocomplete="off">
            </div>
        </div>
        <div class="password">
            <p>Password</p>
            <div class="password-input">
                <iconify-icon icon="mdi:password"></iconify-icon>
                <input type="password" id="password" placeholder="Input your password" type="password" name="password" required autocomplete="off">
    
                <label for="visible">
                    <input hidden class="visibility" type="checkbox" onclick="myFunction()"id="visible">
                    <iconify-icon id="kebuka" style="display: none" icon="material-symbols:visibility"></iconify-icon>  
                    <iconify-icon id="ketutup" style="display: block" icon="ic:sharp-visibility-off"></iconify-icon>
                </label>
            </div>
        </div>
    </div>
    
    <button> {{ __('Log in') }}</button>
</div>
    </form>
</div>
    </div>
    <script>
        function myFunction() {
          var x = document.getElementById("pass");
          let kebuka = document.getElementById('kebuka');
          let ketutup = document.getElementById('ketutup');


          if (x.type === "password") {
            x.type = "text";
            kebuka.style = 'display: block'
            ketutup.style = 'display: none'
          } else {
            x.type = "password";
            kebuka.style = 'display: none'
            ketutup.style = 'display: block'
          }
        }
        </script>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>
</html>

