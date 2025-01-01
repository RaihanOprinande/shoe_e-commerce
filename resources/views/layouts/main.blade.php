<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STEP-OFF</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="head sticky-top">
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
