<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Biografia di {{ $name }}</h1>
    <p>Questa è la biografia di {{ $name }}.</p>
    <p>{{ $bio }}</p>
    <p><a href="{{ url('lista') }}">Vai alla lista</a></p>
</body>
</html>
