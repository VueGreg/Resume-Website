<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Envoyé par {{ $data['surname'] }} {{ $data['name'] }}</h2>
    <h3>Mail de contact: {{ $data['mail'] }}</h3>

    <p>{{ $data['message'] }}</p>
</body>
</html>