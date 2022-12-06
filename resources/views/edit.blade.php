@extends('layout')

@section('style')
<link rel="stylesheet" href="/css/create.css">
@endsection

@section('content')
<form action="/update/{{$todo['id']}}" method="post">
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
    @method('PATCH')
    <div class="input">
    <input type="text" name="title" value="{{$todo['title']}}">

    <input type="date" name="date" value="{{$todo['date']}}">

    <textarea name="description" cols="30" rows="10" >{{$todo['description']}}</textarea>
    </div>
    <button type="submit">Kirim</button>
</form>
@endsection
