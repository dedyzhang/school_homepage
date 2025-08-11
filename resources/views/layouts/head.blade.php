<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Maitreyawira - TPI</title>
 <!-- Fonts -->
 <link rel="preconnect" href="https://fonts.bunny.net">
 <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
 <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo.png') }}" type="image/x-icon">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.0.0/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@wiris/mathtype-tinymce6@8.10.0/plugin.min.js"></script>
 <!-- Styles / Scripts -->
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
     @vite(['resources/css/app.css', 'resources/js/app.js'])
@endif
