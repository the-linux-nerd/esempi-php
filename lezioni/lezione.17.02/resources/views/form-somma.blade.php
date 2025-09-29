<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>inserimento numeri</h1>
    <form action="{{ url('/submit-somma') }}" method="POST">
        @csrf
        <label for="num1">Numero 1:</label>
        <input type="number" id="num1" name="num1" required>
        <br>
        <label for="num2">Numero 2:</label>
        <input type="number" id="num2" name="num2" required>
        <br>
        <button type="submit">Calcola Somma</button>
    </form>
</body>
</html>
