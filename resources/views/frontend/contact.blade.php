@extends('layouts.site')
@section('title', 'Trang Chủ')
@section('content')
    <div>
        <div class="contact-section">
            <form action="{{ route('website.docontact') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h3>Contact Us</h3>
                <form action="submit_form.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea><br>

                    <button type="submit">Submit</button>
                </form>
        </div>
    </div>
@endsection
@section('header')
    <link rel="stylesheet" href="home.css">
@endsection
