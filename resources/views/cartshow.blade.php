<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url("/")}} " class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                            <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>

                            <li class="scroll-to-section">
                                @auth
                                <a href="{{ url("/cart/show", auth()->user()->id) }}">

                                    Cart<i class="fa fa-shopping-cart"></i>{{ $count }}pcs

                                </a>
                                    @else
                                <a href="{{ route('login') }}">

                                    Cart<i class="fa fa-shopping-cart"></i>

                                </a>

                                    @endauth
                            </li>


                            <li>
                            @auth
                            <x-app-layout>

                            </x-app-layout>
                                @else
                                    <li><a href="{{ route('login') }}"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}"
                                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    </li>
                                @endif
                            @endauth
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <div id="top">

        <div class="container" style="max-width: 860px;">
            <table class="table table-dark">
                <tr class="table-active">
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>

            <form action="{{ url("order/confirm") }}" method="POST">
                @csrf
                @foreach ($data as $food)
                    <tr>
                        <td>
                            <input type="hidden" name="foodname[]" value="{{ $food->title }}">
                            {{ $food->title }}
                        </td>
                        <td>
                            <input type="hidden" name="price[]" value="{{ $food->price }}">
                            ${{ $food->price }}</td>
                        <td>
                            <input type="hidden" name="quantity[]" value="{{ $food->quantity }}">
                            {{ $food->quantity }}</td>
                    </tr>
                    @endforeach

                    @foreach ($data2 as $data2)
                    <tr style="position:relative; top: -155px; right: -660px">
                    <td><a href="{{ url("/cart/delete/$data2->id") }}" class="btn btn-outline-danger btn-sm">DELETE</a></td>
                    </tr>
                    @endforeach
            </table>

            <div class="mt-4" align="center">
                <button class="btn btn-outline-primary" type="button" id="order">
                    Order Now
                </button>
            </div>

            <div class="container" style="max-width: 460px; padding-bottom: 50px; display: none" id="appear">
                <div class="mt-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="mt-3">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                </div>
                <div class="mt-3">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Address">
                </div>
                <div class="mt-4" align="center">
                    <input type="submit" class="btn btn-outline-success text-center" value="Confirm Order">
                    <button class="btn btn-outline-info" type="button" id="close">Close</button>
                </div>

            </div>
        </form>
        </div>
    </div>






        <script type="text/javascript">

            $("#order").click(
                function()
                {
                    $("#appear").show();
                }
            );

            $("#close").click(
                function()
                {
                    $("#appear").hide();
                }
            );


        </script>











        <!-- jQuery -->
        <script src="assets/js/jquery-2.1.0.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Plugins -->
        <script src="assets/js/owl-carousel.js"></script>
        <script src="assets/js/accordions.js"></script>
        <script src="assets/js/datepicker.js"></script>
        <script src="assets/js/scrollreveal.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/imgfix.min.js"></script>
        <script src="assets/js/slick.js"></script>
        <script src="assets/js/lightbox.js"></script>
        <script src="assets/js/isotope.js"></script>

        <!-- Global Init -->
        <script src="assets/js/custom.js"></script>
        <script>
            $(function() {
                var selectedClass = "";
                $("p").click(function() {
                    selectedClass = $(this).attr("data-rel");
                    $("#portfolio").fadeTo(50, 0.1);
                    $("#portfolio div").not("." + selectedClass).fadeOut();
                    setTimeout(function() {
                        $("." + selectedClass).fadeIn();
                        $("#portfolio").fadeTo(50, 1);
                    }, 500);

                });
            });
        </script>
    </body>

    </html>
