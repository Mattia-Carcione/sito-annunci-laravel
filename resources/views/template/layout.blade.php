<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('findeasy-logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <title>{{ $title ?? 'FindEasy.com' }}</title>
    @vite(['resources\css\app.css', 'resources\js\app.js'])
    @livewireStyles

</head>

<body class="body-color-ultimate">
   
    <!-- Navigation-->
    <x-nav3 />
    
    {{ $slot }}
    
    <x-footer />
    <x-copyright />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    @livewireScripts
</body>

</html>
