<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Call Records - Stephens Law Group</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    <style>
        /* Adds a little breathing room to the top of the page */
        body {
            padding-top: 2rem;
        }
    </style>
</head>

<body>

    <header class="container">
        <nav>
            <ul>
                <li><strong><a href="/" class="contrast">Call Records - Stephens Law Group</a></strong></li>
            </ul>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </nav>
    </header>

    @yield('content')

    <footer class="container">
        <hr>
        <small>SHENEFELT.ORG</small>
    </footer>

</body>

</html>