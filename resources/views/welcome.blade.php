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

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@ace_kyd" />
    <meta name="twitter:title" content="CleanRepos for GitHub Repositories" />
    <meta name="twitter:description" content="An utility tool to help clear out multiple old, broken, uncompleted or abandoned repositories from your GitHub account." />

    <meta property="og:url" content="https://clean-repos.herokuapp.com" />
    <meta property="og:title" content="CleanRepos for GitHub Repositories" />
    <meta property="og:description" content="An utility tool to help clear out multiple old, broken, uncompleted or abandoned repositories from your GitHub account." />


    <!-- Styles -->
    <style>
        body {
            background-color: #12143c;
            color: #dddddd;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            padding: 1em;
            font-size: 1.1rem;

        }

        header .title {
            width: 148px;
            height: 37px;
            font-size: 27px;
            letter-spacing: 0.3px;
            color: #09be67;
        }

        #content {
            margin: 0;
        }

        #content h2 {
            font-size: 1.5em;
            margin: 1.5rem auto;
        }

        @media (min-width: 767.98px) {

            body {
                padding: 5em;
            }

            #content {
                position: absolute;
                top: 50%;
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
                width: 55%;
            }
        }

        #content h2 .lighter {
            font-weight: 200;
        }

        .authenticate {
            width: 90%;
            max-width: 335px;
            height: 73px;
            border-radius: 10px;
            box-shadow: 0 0 37px 5px rgba(9, 190, 103, 0.64);
            background-color: #09be67;
            font-size: 27px;
            font-weight: bold;
            letter-spacing: 0.3px;
            color: #212529;
            margin: 2em 0;
            border-style: none;
        }
    </style>

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
    <section id="content">
        <h2>Clean Repositories <span class="lighter">Fast and easy</span></h2>
        <p>
            CleanRepos is a simple web application that helps you clean up your GitHub repos. You have unused forks, abandoned and empty projects etc that may serve as a distraction if someone is trying to view your profile or see projects you work on.
        </p>

        <div>
            <a href="/login">
                <button class="authenticate">Get Started</button>
            </a>
        </div>
    </section>

    <footer class="col-md fixed-bottom text-center">
        <small>♠🖤 - Check out the repo on <a href="https://www.github.com/acekyd/clean-repos">GitHub</a>.</small>
    </footer>

    <!-- Include vuejs output script. -->
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>