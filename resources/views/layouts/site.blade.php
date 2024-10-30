<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>HungHungShop</title>
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/js/all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/js/fontawesome.min.js') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @yield('heard')

</head>

<body>
    <header>
        <!--header-->
        <div class="header">
            <div class="logo">
                <img src="image/logo.png" alt="Logo" />
            </div>
            <div class="menu">
                <a href="{{ route('home') }}">Home</a>
                <div class="dropdown">
                    <a href="{{ route('site.product') }}">Product</a>
                    <div class="dropdown-content">
                       
                    </div>
                </div>
                <a href="new">Tin Tức</a>
                <a href="contact">Contact</a>
                <a href="about">About</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search..." />
                <button type="button"><i class="fas fa-search"></i></button>
            </div>
            <div class="login-register">
                <a href="{{ route('website.getlogin') }}">Login</a>
                <a href="{{ route('website.getregister') }}">Register</a>
                @php
                    $count = count(session('carts', []));
                @endphp
                <a class="text-dark" href="{{ route('site.cart.index') }}">(<span
                        id="showqty">{{ $count }}</span>)<i class="fas fa-shopping-cart"></i> Cart</a>
            </div>
        </div>
    </header>



    <main>
        @yield('content')
    </main>

    <!--End header-->
    <footer>
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
    <!--End footer-->
</body>

</html>
