@extends('layout')

@section('style')
<link rel="stylesheet" href="/css/create.css">
@endsection

@section('content')
<form action="/store" method="post">
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
    <div class="form">
    <label for="">Title</label>
    <input type="text" name="title">
    <label for="">Date</label>
    <input type="date" name="date">
    <label for="">Description</label>
    <textarea name="description" cols="30" rows="10"></textarea>
    </div>
    <button type="submit"><p>Kirim</p></button>
</form>
@endsection
