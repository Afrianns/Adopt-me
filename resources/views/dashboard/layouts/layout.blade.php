<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>ADOPT ME | Dashboard</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="/img/favicons/site.webmanifest">

    <x-head.form-config />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- favicon  -->

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <!-- external CSS -->
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="/css/dashboard.css" rel="stylesheet" />
</head>

<body class="body">

    <header class="navbar sticky-top flex-md-nowrap border-bottom">
        <a class="navbar-brand col col-md-3 col-lg-2 px-3 border-end fs-5 fw-bold" href="/">LIBOOK</a>
        <div class="navbar-nav">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                    {{ auth()->user()->username ?? 'noname' }}
                </button>
                <ul class="dropdown-menu">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item text-danger">Logout</button>
                    </form>
                </ul>
            </div>
        </div>

    </header>

    <div class="container mb-5">
        <div class="row">
            @include("dashboard.layouts.sidebar")
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    @yield("interface")
                </div>
            </main>
        </div>
    </div>
    <footer class="border-top row">
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <x-footer />
        </div>
    </footer>

    <script src="js/dashboard.js"></script>
</body>

</html>