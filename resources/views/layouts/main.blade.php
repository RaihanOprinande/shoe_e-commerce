<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STEP-OFF</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

        /* Menambahkan gaya untuk kontainer */

        .nav-link {
            position: relative;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease-in-out;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 0;
            height: 2px;
            background-color: black;
            transition: width 0.3s;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            left: 0;
            transform: translateX(0);
        }
        .btn-search{
            color: black;
            border-color: black;
        }
        .btn-search:hover{
            color: white;
            background-color: black;
            border-color: black
        }
        .footer{
            /* min-height: 10vh; */
        }


    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="head mb-2">
            @include('layouts.header')
        </div>
        <div class=" main-content">
            @yield('content')
        </div>
        <div class="footer">
            @include('layouts.footer')
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
