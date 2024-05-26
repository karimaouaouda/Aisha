<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
</head>
<body>
    <div id="app" class="w-screen h-screen bg-sky-100">
        <div class="w-full h-full flex">
            {{ $slot }}
        </div>
    </div>
</body>
</html>