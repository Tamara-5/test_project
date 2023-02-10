<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Test Task</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
    </head>
    <body>
    <main>
        <header>
            <nav>
                <a href="/all-clients">View all clients</a>
                <a href="/reports">View report</a>
                <a href="/logout">Լogout</a>
            </nav>
        </header>
    </main>
        @yield("content")
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>