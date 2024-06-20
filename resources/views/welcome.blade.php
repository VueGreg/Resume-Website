<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Découvrez le CV de WOLFF Grégory, avec une expérience en Développement web full-stack. Explorez mon parcours professionnel, mes réalisations et mes projets. Téléchargez mon CV en PDF et contactez-moi pour des opportunités.">
        <meta name="keywords" content="CV, WOLFF Grégory, Développeur Web Full-stack, Développer une interface utilisateur web dynamique, Développer la partie back-end d'une application web, Intégration des pratiques de sécuritées, expérience professionnelle, projets, réalisations, télécharger CV, opportunités professionnelles">
        <meta name="author" content="Grégory WOLFF">
        <meta name="robots" content="index, follow">
        <meta property="og:title" content="CV de Grégory WOLFF - Développeur Web Full-stack">
        <meta property="og:description" content="Découvrez le CV de Grégory WOLFF, avec une expérience en Développement web full-stack et des compétences en PHP, Javascript, VUEJS, Angular, Java et Laravel. Explorez mon parcours professionnel, mes réalisations et mes projets. Téléchargez mon CV en PDF et contactez-moi pour des opportunités.">
        <meta property="og:image" content="http://garagev.parrot.gregory-wolff.com/Moi-removebg-preview.webp">
        <meta property="og:url" content="https://curriculum.gregory-wolff.com">
        <meta property="og:type" content="website">


        <title>Curriculum Vitea de WOLFF Grégory - Développeur Web Full-stack</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap">
        @vite(['resources/js/app.js', 'resources/css/app.css'])
        
    </head>
    <body id="scrollId">
        <div id="app"></div>

        <script src="https://kit.fontawesome.com/a0d5f723cd.js" crossorigin="anonymous"></script>
        <script>
            window.APP_CONFIG = {
                API_TOKEN: "{{ env('API_TOKEN') }}",
                APP_URL: "{{ env('APP_URL') }}"
            };
        </script>
    </body>
</html>
