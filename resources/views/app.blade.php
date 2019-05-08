<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            background-color: #12143c;
            color: #dddddd;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            padding: 5em;
            font-size: 22px;

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
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            width: 55%;
        }

        #content h2 .lighter {
            font-weight: 200;
        }

        .authenticate {
            width: 335px;
            height: 73px;
            border-radius: 44.5px;
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
</head>

<body>
    {{ var_dump(session()->all()) }}
    <div id="app">

    </div>

</body>

</html>