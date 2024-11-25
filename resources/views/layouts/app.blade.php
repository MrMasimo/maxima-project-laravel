<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        a,
        a:hover,
        a:focus {
            text-decoration: none;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            font-size: 16px;
            font-family: sans-serif;
            line-height: 1.5;
            color: #333;
        }

        #app {
            padding: 0 15px;
            max-width: 980px;
            margin: 0 auto;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav {
            padding: 10px;
            background-color: lightblue;
            flex-wrap: wrap;
            gap: 20px
        }

        main p {
            text-align: justify;
        }

        button {
            padding: 0.5em 1em;
            background: lightblue;
            color: #000;
            font-weight: bold;
            outline: none;
            border: 1px solid;
            border-radius: 5px;
            transition: all 0.1s;
            cursor: pointer;
        }

        button:hover,
        button:focus {
            background-color: #333399;
            color: #fff;
        }

        button a {
            color: #fff;
        }

        img {
            display: inline-block;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div id="app">
        <header>
            <nav>
                <a href="/">Главная</a>
                <a href="{{ route('tasks.index') }}">Список задач</a>
            </nav>
        </header>

        <main class="py-4">
            @yield('content')
        </main>

    </div>
</body>

</html>
