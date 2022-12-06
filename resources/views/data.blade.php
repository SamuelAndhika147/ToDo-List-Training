@extends('layout')

@section('style')

<link rel="stylesheet" href="/css/data.css">
@endsection

@section('content')
{{session ('done')}}
<table class="table">
    <tr>
        <td>No</td>
        <td>Kegiatan</td>
        <td>Deskripsi</td>
        <td>Batas Waktu</td>
        <td>Status</td>
        <td>Aksi</td>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($todos as $todo)
    <tr>
        {{-- tiap di looping, $no bakal ditambah 1 --}}
        <td>{{ $no++ }}</td>
        <td>{{ $todo['title'] }}</td>
        <td>{{ $todo['description'] }}</td>
        {{-- carbon : package date pada laravel, nntinya date yg 2022-11-22 formatnya jadi 22 november, 2022 --}}
        <td>{{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}</td>
        {{-- konsep ternary, if statusnya 1 nampilin teks complated kalo 0 nampilin teks on-proses --}}
        <td>{{ $todo['status'] ? 'Complated' : 'On-Process' }}</td>
        <td>
            <div class="row-button">
            <button><a href="/edit/{{$todo['id']}}">Edit</a> </button>
            <form action="/destroy/{{$todo['id']}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"><p>Delete</p></button>
            </form>
            <form action="/complated/{{$todo['id']}}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit">Complated</button>
            </form>
            </div>
        </td>   
    </tr>
    @endforeach
</table>
@endsection
