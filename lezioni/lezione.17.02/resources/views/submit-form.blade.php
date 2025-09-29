<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Dati inviati tramite form</h1>
    <p>Nome: {{ $name }}</p>
    <p>Bio: {{ $bio }}</p>
    <a href="{{ url('/form') }}">Torna al form</a>
</body>
</html>
