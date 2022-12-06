@extends('layout')

@section('style')
<link rel="stylesheet" href="/css/login.css">
@endsection

@section('content')
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>

<form action="/register" method="POST">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="list-style-type: none;">
            @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h3>Register Here</h3>
    @csrf
    <label for="password">Email</label>
    <input type="text" placeholder="example@gmail.com" name="email">

    <label for="username">Username</label>
    <input type="text" placeholder="your name" name="username">

    <label for="password">Password</label>
    <input type="password" placeholder="password" name="password">

    <a href="/"><button>Register</button></a>
<div class="confirm">
    
    <p>Have account? <a href="/">Login</a></p>
</div>

    {{session('berhasil')}}
</form>
@endsection
