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

    <meta name="description" content="CleanRepos is an utility tool to help clear out multiple old, broken, uncompleted or abandoned repositories from your GitHub account."/>

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@ace_kyd" />
    <meta name="twitter:title" content="CleanRepos for GitHub Repositories" />
    <meta name="twitter:description" content="An utility tool to help clear out multiple old, broken, uncompleted or abandoned repositories from your GitHub account." />

    <meta property="og:url" content="https://clean-repos.herokuapp.com" />
    <meta property="og:title" content="CleanRepos for GitHub Repositories" />
    <meta property="og:description" content="An utility tool to help clear out multiple old, broken, uncompleted or abandoned repositories from your GitHub account." />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-140077923-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-140077923-1');
    </script>


</head>

<body>
    <header>
        <!-- Icon goes here -->
        <span class="title">CleanRepos</span>
    </header>

    <div id="app">
        <repos-component :user="{{ collect(session()->get('user')) }}"></repos-component>
    </div>

    <footer class="col-md fixed-bottom text-center">
        <small>♠🖤 - Check out the repo on <a href="https://www.github.com/acekyd/clean-repos">GitHub</a>.</small>
    </footer>

    <!-- Include vuejs output script. -->
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>