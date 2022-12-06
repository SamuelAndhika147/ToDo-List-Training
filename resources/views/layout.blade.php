<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    @yield('style')
     <link rel="shortcut icon" href="/img/wk.png" type="image/x-icon">
    <title>Todo App</title>
</head>
<body>
@if (Auth::check())
<!-- navbar -->
<header>    
    <div class="brand"><a href="/home">Home</a></div>
    <nav>
        <ul>
            @if(auth()->user()->role === 'admin')
            <li><a href="dashboard">Dashboard</a></li>
            @endif
            <li><a href="/data">Data</a></li>
            <li><a href="/create">Create</a></li>
            @if(auth()->check())
            <li><a href="/logout">Logout</a></li>
            @else
            <li><a href="/login">Login</a></li>
            @endif
        </ul>
    </nav>
</header>
@endif

   @yield('content')
   <script src="/js/script.js"></script>
</body>
</html>
