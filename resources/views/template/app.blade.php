<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/d57303f25d.js" crossorigin="anonymous"></script>
    <title>Equestrian Organizers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>

</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div ><img style="height: 50px; filter: invert(100%)" src="{{asset('img/EO-index.svg')}}" alt=""></div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mr-auto" id="navbarCollapse">
                <ul class="navbar-nav mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Members">Members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/News">News</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/Contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
@yield('content')
<footer class="container mt-4">
    <p class="float-end "><a class="text-black-50" href="#">Back to top</a></p>
    <p>&copy; 2017–2021 Equestrian Organizers &middot; <a class="text-black-50" href="https://www.gdprprivacynotice.com/live.php?token=7ozzFZtzAmq2YuRnh9JPln7yVRPZEM6F">Privacy</a></p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</div>
</body>
</html>
