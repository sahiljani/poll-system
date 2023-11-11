<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Poll - Free Poll Maker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    {{-- add links to support fab --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .shadow-card {
            box-shadow: 0 0 10px 1px rgb(0 0 0 / 14%), 0 1px 14px 2px rgb(0 0 0 / 12%), 0 0 5px -3px rgb(0 0 0 / 30%);
            margin: auto;
            border-radius: 4px;
            text-align: center;
        }

        .bg-linear-gradient-insta {
            background: linear-gradient(269.64deg, #BC1888 12.05%, #DC2743 38.26%, #F09433 71.72%);
            border: #BC1888;
        }

        .page-content p, .page-content h2, .page-content li{
            text-align: left;
        }

        @media (max-width: 767px) {
            .md-no-top-padding {
                padding-top: 0;
            }
            .container{
                max-width: 90%;
                width: 90%;
                margin:auto;
            }

            main.mt-5 {
                margin-top: 1rem !important;
            }

            main.mb-5 {

                margin-bottom: 1rem !important;
            }

        }
    </style>
{!! $header !!}


    



</head>

<body>
    <!-- Global Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">           
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">Today's Poll</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
                        </li>
                        <li class="nav-item">
                        <a href="{{ route('create-poll') }}" class="btn btn-primary">Create Poll</a>
                        </li>
                        <!-- Add more navigation links as needed -->
                    </ul>
                </div>
            </div>            
        </nav>
      </header>
      

    <!-- Page Content -->
    <main class="mt-5 mb-5">
        <div id="main-container" class="container w-100 shadow-card py-4">
            @yield('content')
        </div>
    </main>

    <!-- Global Footer -->
    <footer class="bg-dark text-center text-white">
        <div class="container p-4">
            <section class="mb-4">
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#" role="button"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#" role="button"><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#" role="button"><i
                        class="fab fa-instagram"></i></a>
            </section>

            <section class="mb-4 d-flex justify-content-evenly align-items-center">
                <!-- For mobile (display as block) -->
                <div class="d-lg-none w-100">
                    <p>Sign up for our newsletter</p>
                    <div class="form-outline emaildiv form-white mb-4">
                        <input type="email" name="email_newsletter" placeholder="Email Address" class="form-control">
                    </div>
                    <button class="btn btn-outline-light mb-4" disabled>Subscribe</button>
                </div>
            
                <!-- For larger screens (display as flex) -->
                <div class="d-none d-lg-flex justify-content-evenly align-items-center w-100">
                    <p class="w-20">Sign up for our newsletter</p>
                    <div class="w-50 form-outline emaildiv form-white mb-4">
                        <input type="email" name="email_newsletter" placeholder="Email Address" class="form-control">
                    </div>
                    <button class="w-20 btn btn-outline-light mb-4" disabled>Subscribe</button>
                </div>
            </section>
            

            <section class="mb-4">
                <p>Gather opinions and insights with Today's Poll - the user-friendly platform for creating and
                    participating in engaging polls. Join us today to start polling!</p>
            </section>

            <section class="mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/static/rising.png') }}" alt="" class="w-25 h-100 img-fluid roundedlogo">
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled futternavi mb-0 d-inline text-left">
                            <li><a href="/privacy" class="text-white text-decoration-none   text-left">Privacy Policy</a></li>
                            <li><a href="/terms_condion" class="text-white text-decoration-none text-left">Terms &amp; condition</a></li>
                            <li><a href="/disclaimer" class="text-white text-decoration-none    text-left">Disclaimer</a></li>
                            <li><a href="/contact_us" class="text-white text-decoration-none    text-left">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <a class="text-white" href="https://Today's Poll.com/">©Today's Poll. All rights reserved.</a>
        </div>
    </footer>


    <!-- Bootstrap JavaScript (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {!! $footer !!}
</body>

</html>
