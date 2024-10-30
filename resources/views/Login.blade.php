<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/js/all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/js/fontawesome.min.js') }}">
    <link rel="stylesheet" href="{{ asset('..//public/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--header-->
    <div class="header">
        <div class="logo">
            <img src="image/logo.png" alt="" />
        </div>
        <div class="menu">
            <a href="{{ route('home') }}">Home</a>
            <a href="">Shop</a>
            <a href="">Features</a>
            <a href="">Blog</a>
            <a href="">About</a>
            <a href="">Contact</a>
        </div>
        <div class="login-register">
            
            <a href="{{ route('website.getregister') }}">Register</a>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <!--End header-->
    <div class="bg_login">
        <form action="{{ route('website.dologin') }}" method="post">
            @csrf
            <div class="login">
                <div class="tieude">Email</div>
                <div class="nhaplieu">
                    <input class="cssform" placeholder="Please enter email" name="username">
                </div>
                <div class="tieude">Password</div>
                <div class="nhaplieu">
                    <input type="password" class="cssform" placeholder="Please enter Password" name="password">
                </div>

                <div class="tieude"></div>
                <div class="nhaplieu">
                    <button type="submit" class="btn">Login</button>
                    <button type="button" class="btn">Cancel</button>
                </div>
            </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('message'))
        <script>
            toastr.option = {
                "processBar": true,
                "closeButton": true
            }
            toastr.error("{{ Session::get('message') }}");
        </script>
    @endif

    <!--Footer-->
    <div class="footer">
        <!--list category-->
        <div class="list-category">
            <h3>Category</h3>
            <ul>
                <li>
                    <a href="">Women</a>
                </li>
                <li>
                    <a href="">Men</a>
                </li>
                <li>
                    <a href="">Shoes</a>
                </li>
                <li>
                    <a href="">Watches</a>
                </li>
            </ul>
        </div>
        <!--End list category-->
        <!--Help-->
        <div class="help">
            <h3>Help</h3>
            <ul>
                <li>
                    <a href="">Track order</a>
                </li>
                <li>
                    <a href="">Returns</a>
                </li>
                <li>
                    <a href="">Shipping</a>
                </li>
                <li>
                    <a href="">FAQs</a>
                </li>
            </ul>
        </div>
        <!--End help-->
        <!--Address-->
        <div class="address">
            <h3>Address</h3>
            <ul>
                <li>
                    Address: Biên Hoà - Đồng Nai <br />

                </li>
                <li>Telephone: 0961804507</li>
                <li>Email: <a href="nguyenmanhhung176472@gmail.com"> nguyenmanhhung176472@gmail.com </a></li>
            </ul>
        </div>
        <!--End address-->
        <!--Network-->
        <div class="network">
            <h3>Social Network</h3>
            <ul>
                <li>
                    <a href="http://youtube.com">Youtube</a>
                </li>
                <li>
                    <a href="">Facebook</a>
                </li>
                <li><a href="">Twitter</a></li>
            </ul>
        </div>
        <!--End network-->
    </div>
    @yield('footer')
    </footer>

</body>

</html>
