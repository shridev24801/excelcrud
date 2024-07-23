<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Customer Management')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    .fade-out {
        transition: opacity 0.5s ease-out;
    }
</style>
</head>
<body>
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>
