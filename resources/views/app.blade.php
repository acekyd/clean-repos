<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CleanRepos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
</head>

<body>
    <header>
        <!-- Icon goes here -->
        <span class="title">CleanRepos</span>
    </header>

    <div id="app">
        <repos-component :user="{{ collect(session()->get('user')) }}"></repos-component>
    </div>

    <footer class="col-md fixed text-center">
        <small>♠🖤 - Check out the repo on <a href="https://www.github.com/acekyd/clean-repos">GitHub</a>.</small>
    </footer>

    <!-- Include vuejs output script. -->
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>