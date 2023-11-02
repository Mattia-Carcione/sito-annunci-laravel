<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('findeasy-logo.png')}}" type="image/x-icon">
    <title>FindEasy.com</title>
    @vite(['resources\css\app.css', 'resources\js\app.js'])

</head>

<body>
    {{ $slot }}
</body>

</html>