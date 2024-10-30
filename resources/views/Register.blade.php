<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thành viên</title>
    <link rel="stylesheet" href="{{ asset('..//public/css/register.css') }}">
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="image/logo.png" alt="Logo" />
        </div>
        <div class="menu">
            <a href="{{ route('home') }}">Home</a>
            <a href="#">Shop</a>
            <a href="#">Features</a>
            <a href="#">Blog</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
        <div class="login-register">
            <a href="{{ route('website.getlogin') }}">Login</a>
            <a href="{{ route('website.getregister') }}">Register</a>
        </div>
    </div>
    <!-- End Header -->

    <!-- Form Đăng Ký -->
    <div class="bg_login">
        <div class="login">
            <h2>Đăng Ký Tài Khoản</h2>
            <form action="{{ route('website.doregister') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="cssform" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="cssform" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="cssform" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="cssform" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="cssform" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="cssform" required>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div class="gender-options">
                        <input type="radio" name="gender" value="male" required> Male
                        <input type="radio" name="gender" value="female" required> Female
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Register</button>
                    <button type="reset" class="btn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Form Đăng Ký -->

    
   
</body>

</html>
