<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>STEP-OFF</title>

    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Placeholder and global styles */
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Custom Divider */
        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        /* Main layout styling */
        main {
            background-color: #f8f9fa; /* Light gray background for contrast */
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for elevation */
        }

        /* Custom Button */
        .custom-button {
            border: 1px solid white;
            color: white;
            width: 100px; /* Set a fixed width to ensure uniformity */
            text-align: center;
            display: inline-block;
            margin: 0 5px;
        }

        .custom-button:hover {
            background-color: white;
            color: black;
        }

        /* Sidebar Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                margin-bottom: 20px;
            }
        }
        .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px; /* Adjust the width as needed */
    background-color: #f8f9fa; /* Adjust the background color as needed */
    overflow-y: auto;
    padding-top: 20px;
}
    </style>

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
</head>

<body>

    {{-- Header Include --}}
    {{-- @include('dashboard.layouts.header') --}}

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar Include --}}
            @include('dashboard.layouts.sidebar')

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
