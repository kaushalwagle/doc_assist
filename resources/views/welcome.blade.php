<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            line-height: 1.6;
            border-radius: 0.25rem;
            -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-success {
            color: #fff;
            background-color: #38c172;
            border-color: #38c172;
        }

        .btn-success:hover {
            color: #fff;
            background-color: #2fa360;
            border-color: #2d995b;
        }

        .btn-success:focus,
        .btn-success.focus {
            color: #fff;
            background-color: #2fa360;
            border-color: #2d995b;
            box-shadow: 0 0 0 0.2rem rgba(86, 202, 135, 0.5);
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">


        <div class="content">
            <div class="title m-b-md">
                Doc Assist
            </div>

            <h2>
                Digitalizing Medical Records
            </h2>
            @if (Route::has('login'))

            @auth
            <a class="btn btn-success" href="{{ url('/home') }}">Home</a>
            @else
            <a class="btn btn-success" href="{{ route('login') }}">Login</a>


            @endauth
            @endif
        </div>
    </div>
</body>

</html>
