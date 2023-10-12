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
        <nav class="navbar navbar-expand-lg bg-white p-5">
            <div class="container-fluid row">
                <div class="col-1">
                    <a href="{{url('')}}" class="navbar-brand">
                        <img src="{{asset('assets/Icon/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="collapse navbar-collapse col-11">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item ms-5">
                            <a class="nav-link text-dark" href="#">Lorem Ipsum</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link text-dark" href="#">Dolor</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link text-dark" href="#">Sit Amet</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link text-dark" href="#">Sed Diam</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link text-dark" href="#">Dolore</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link text-dark" href="#">Magna</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item ms-5">
                            <a class="nav-link text-dark" href="#">
                                <img src="{{asset('assets/Icon/icon - search green.png')}}" alt="">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">
                                <img src="{{asset('assets/Icon/icon - profile green.png')}}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
        <div class="col-1 py-4">
        </div>
        <div class="col-11 m-0 p-0 bg-white pb-4 ps-4">
            <div class="container-fluid ps-5">
                <div class="row mb-5">
                    <div class="col-9">
                        <img
                            style="width: 100%"
                            src="{{asset('/assets/Images/close-up-hand-farmer-garden-during-morning-time-food-background_1150-7184.jpeg')}}"
                            alt=""
                        >
                        <h2 class="w-50 text-success mt-2">
                            {{$artikel->judul_artikel}}
                        </h2>
                    </div>

                    <div class="col-8 pt-4 px-4">
                        <p class="fw-bold">20 June 2022</p>
                        <div>
                            {!! $artikel->isi_artikel !!}
                        </div>
                        <div class="col-12 border-top border-bottom">
                            <span class="d-inline">Comment</span>
                            <ul class="nav list-unstyled justify-content-end d-flex">
                                <li>
                                    <span class="text-muted me-3 justify-content-end d-flex">
                                        Share
                                    </span>
                                </li>
                                <li>
                                    <a  href="#">
                                        <img src="{{asset("assets/Icon/icon - fb article.png")}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a  href="#">
                                        <img src="{{asset("assets/Icon/icon - wa article.png")}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a  href="#">
                                        <img src="{{asset("assets/Icon/icon - twitter article.png")}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a  href="#">
                                        <img src="{{asset("assets/Icon/icon - share link article.png")}}" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="row pt-4">
                            <div class="col-12 fw-bold">
                                1 Comment(s)
                            </div>
                            <div class="col-12 row pt-2 px-0 mx-0">
                                <div class="col-1">
                                    <img
                                        class="img-fluid"
                                        src="{{asset('/assets/Icon/icon - profile comment.png')}}"
                                        alt=""
                                        >
                                </div>
                                <div class="col-11 p-0">
                                    <form action="">
                                        <textarea class="form-control" cols="30" rows="10"></textarea>
                                        <div class="justify-content-end d-flex mt-2">
                                            <button class="btn btn-success">Post</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 row pt-2 px-0 mx-0 mt-5">
                                <div class="col-1">
                                    <img
                                        class="img-fluid"
                                        src="{{asset('/assets/Icon/icon - profile comment.png')}}"
                                        alt=""
                                        >
                                </div>
                                <div class="col-11 p-0">
                                    <form action="">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam accusamus aut ut alias quibusdam assumenda consequuntur ullam adipisci deserunt impedit praesentium maiores, dolorem ipsam explicabo iste repellat dolor distinctio et.
                                    </form>
                                </div>
                            </div>
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

                <div class="col-9 justify-content-center d-flex row px-4 mt-5">
                    <div class="col-12">
                        <h2 class="text-success">GO TO NEWS PAGE   ______</h2>
                    </div>
                    @foreach ($newArticles as $item)
                        <div class="col-6 px-5">
                            <div class="card card-item">
                                <img src="{{asset("assets/Images/asian-family-enjoy-cooking-salad-together-kitchen-room-home_74952-1272.jpeg")}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <a class="card-title text-success fs-4 fw-bold nav-link" href="{{route('artikel', $item->slug)}}">
                                        {{$item->title}}
                                    </a>
                                    <p class="card-text">
                                        {{$item->desc}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="container-fluid px-0 row footer  mx-0">
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

    @stack("scripts")
</body>
</html>

