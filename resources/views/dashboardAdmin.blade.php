<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
</head>
<body>
    <div>
        <h1>
            Dashboard Admin
            {{ Auth::user()->name }}
        </h1>

        <a href="{{ route('logout') }}">Se deconnecter</a>
    </div>
</body>
</html>