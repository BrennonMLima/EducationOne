<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMw8YbQ0kR7/CpqLhf38hZ0jXb2QJ+WbQm2gZ" crossorigin="anonymous">
<body>

    @include('layouts._header')

    <main>
        @yield('content')
    </main>

</body>
</html>
