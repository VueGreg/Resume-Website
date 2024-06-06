<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Curriculum Vitea WOLFF Grégory</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        @vite(['resources/js/app.js', 'resources/css/app.css'])
        
    </head>
    <body id="scrollId">
        <div id="app"></div>

        <script>@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');</script>
        <script src="https://kit.fontawesome.com/a0d5f723cd.js" crossorigin="anonymous"></script>
        <script> window.APP_CONFIG = {API_TOKEN: "{{ env('API_TOKEN') }}"};</script>
    </body>
</html>
