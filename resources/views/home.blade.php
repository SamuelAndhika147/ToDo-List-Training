@extends('layout')

@section('style')
<link rel="stylesheet" href="/css/home.css">
@endsection

@section('content')
<div class="container">
    <div class="title">
        <h1>Selamat Datang di Page Home Todo List </h1>
    </div>
</div>
@endsection

@if(session('addTodo'))
<h2>{{ session('addTodo') }}</h2>
@endif

@if(session('isGuest'))
<h2>{{ session('isGuest') }}</h2>
@endif

@if(session('berhasil'))
{{ session('berhasil') }}
@endif
