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
    <?php
    if (!session()->get('user')) {
        redirect()->route('/');
    }
    ?>
    <div id="app">
        <repos-component :user="{{ collect(session()->get('user')) }}"></repos-component>
    </div>

    <!-- Include vuejs output script. -->
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>