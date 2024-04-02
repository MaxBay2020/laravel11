<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- 使用css -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <header>header</header>
    {{-- 使用message变量 --}}
    @session('message')
        <div class="success-message">{{ session('message')  }}</div>
    @endsession()

    {{-- 在layout中使用$slot来表示children --}}
    {{ $slot  }}
    <footer>footer</footer>
</body>
</html>
