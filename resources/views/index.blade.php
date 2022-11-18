<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <title>Index</title>
</head>
<body>
<div class="container">
    <div class="d-flex bg-secondary">
        <h2 class="mt-2 me-auto"><a href="/" style="color: black; text-decoration:none; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Cakra</a></h2>
        <h2 class="mt-2 me-4"><a href="/dashboard">dashboard</a></h2>
        @if (Auth::check() != true)
        <form action="/login" method="GET">
            @csrf
        <button class="btn btn-dark" type="submit">Login</button>
        </form>
        @else
        <form action="/logout" method="post">
            @csrf
            <button class="btn btn-dark mt-2 ms-auto" type="submit">Logout</button>
        </form>
    </div>
    <h2 class="mt-2 ms-auto">Halo {{ Auth::user()->name }}</h2>
            @endif
</div>
</body>
</html>
