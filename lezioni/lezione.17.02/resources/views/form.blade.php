<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form</h1>
    <form action="{{ url('/submit-form') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="bio">Biografia:</label>
        <textarea id="bio" name="bio" required></textarea>
        <br>
        <button type="submit">Invia</button>
    </form>
</body>
</html>
