@extends('layout')

@section('style')
<link rel="stylesheet" href="/css/login.css">
@endsection

@section('content')
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="{{ route('login-baru') }}" method="POST">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="list-style-type: none;">
            @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
    <h3>Login Here</h3>

    <label for="password">Email</label>
    <input type="text" placeholder="example@gmail.com" name="email">

    <label for="password">Password</label>
    <input type="password" placeholder="password" name="password">

    <button>Log In</button>
    <div class="confirm">
        <p>Dont have account yet? <a href="register">register</a></p>
    </div>
    <br>
    <h4>
        @if(session('berhasil'))
        {{session('berhasil')}}
        @endif

        @if(session('error'))
        {{session('error')}}
        @endif

        @if(session('isLogin'))
        {{ session('isLogin') }}
        @endif
    </h4>

    <!-- <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div> -->
</form>
@endsection
