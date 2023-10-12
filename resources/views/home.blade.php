<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="csrf-token" content={{csrf_token()}}>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>window.BASE_URL = "{{ url('') }}"</script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app" class="container-fluid row p-0 m-0">
        <nav class="navbar navbar-expand-lg p-5 fixed-top">
            <div class="container-fluid row">
                <div class="collapse navbar-collapse col-11 offset-1">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item ms-5">
                            <a class="nav-link text-light" href="#">Lorem Ipsum</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link text-light" href="#">Dolor</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link text-light" href="#">Sit Amet</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link text-light" href="#">Sed Diam</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link text-light" href="#">Dolore</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link text-light" href="#">Magna</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item ms-5">
                            <a class="nav-link text-light" href="#">
                                <img src="{{asset('assets/Icon/icon - search.png')}}" alt="">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">
                                <img src="{{asset('assets/Icon/icon - profile.png')}}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
        <div class="col-1 py-4">
            <div class="ms-auto">
                <a href="">
                    <img src="{{asset('assets/Icon/logo.png')}}" alt="">
                </a>
            </div>
        </div>
        <div class="col-11 m-0 p-0">

            {{-- jumbotron --}}
            <div class="vh-100 p-0">
                <div class="jumbotron mb-3 d-flex align-items-start flex-column ">
                    <div class="container mt-auto pb-5 ps-5">
                        <div style="border-left: 2px solid #fff" class="ps-2">
                            <h1 class="display-5 w-50 fw-bold">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            </h1>
                            <p class="w-50">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                        </div>
                        <button class="btn btn-outline-light btn-lg" type="button">Example button</button>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 pt-4 px-4">
                        <h2 class="text-success">THE LATEST   ______</h2>

                        <div class="row mt-4">
                            @foreach($artikel as $item)
                                <div class="col-6 px-5">
                                    <div class="card card-item">
                                        <img src="{{asset("assets/Images/asian-family-enjoy-cooking-salad-together-kitchen-room-home_74952-1272.jpeg")}}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a class="card-title text-success fs-4 fw-bold nav-link" href="{{route('artikel', $item->slug)}}">
                                                {{$item->title}}
                                            </a>
                                            <p class="card-text">
                                                {!! $item->desc !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-4 pt-5">
                        <div class="border-start px-5 py-4 mt-1">
                            <h5 class="text-success">
                                Trending
                            </h5>
                            <ol class="list-group list-group-flush w-75 list-bg-transparent">
                                @foreach($trending as $trend)
                                    <li class="list-group-item">
                                        <a href="{{$trend->slug}}" class="nav-link">
                                            {{$trend->title}}
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-0 row footer  mx-0 mt-4">
            <footer class="row pt-5  pb-3 col-8 offset-2 text-light">
                <div class="col mb-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link p-0 text-light">News</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link p-0 text-light">E-shop</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link p-0 text-light">About Us</a>
                        </li>
                    </ul>
                </div>

                <div class="col mb-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link p-0 text-light">Privacy Policy</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link p-0 text-light">Guideline</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link p-0 text-light">FAQ</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link p-0 text-light">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <div class="col mb-3">
                    <h4>THE LATEST FROM US</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter your email" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-success" type="button" id="button-addon2">Sign Up</button>
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <ul class="nav col-12 list-unstyled justify-content-center d-flex">
                        <li class="ms-3">
                            <a  href="#">
                                <img src="{{asset("assets/Icon/icon - fb footer.png")}}" alt="">
                            </a>
                        </li>
                        <li class="ms-3">
                            <a  href="#">
                                <img src="{{asset("assets/Icon/icon - ig footer.png")}}" alt="">
                            </a>
                        </li>
                        <li class="ms-3">
                            <a  href="#">
                                <img src="{{asset("assets/Icon/icon - twitter footer.png")}}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>

            </footer>
        </div>

        <div class="container-fluid m-0 p-0">
            <footer class="copyright py-3">
                <p class="text-center text-white m-0">© 2022 Company, Inc</p>
            </footer>
        </div>
    </div>

    <script>
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function () {
        if (window.pageYOffset > 150) {
            nav.classList.remove('fixed-top');
        } else {
            nav.classList.add('fixed-top');
        }
        });
    </script>
</body>
</html>

