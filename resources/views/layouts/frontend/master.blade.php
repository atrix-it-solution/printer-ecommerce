 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - VSIPL</title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome-all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" />

    <!-- JS (jquery) -->
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>

</head>
<body>
    <main class="min-vh-100 d-flex flex-column">
        {{-- Header --}}
        @include('layouts.frontend.header')
      
        {{-- Main Content --}}
        @yield('content')

        {{-- Footer --}}
        @include('layouts.frontend.footer')

      
    </main>


    <div class="search_sec p-4" id="searchbar">
        <div class="search_sec_inner p-4">
            <div class="search_head">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span>WHAT ARE YOU LOOKING FOR?</span>
                    <a href="javascript:void(0);" id="closeSearch" class="close_icon"><i class="fa-solid fa-times"></i></a>
                </div>
                <div class="search_bar">
                    <form action="">
                        <div class="form-group position-relative">
                            <input type="text" placeholder="Search Products..." name="search" id="search" />
                            <button type="submit" class="searchbtn"><i class="fa-solid fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="search_body">
                <h5 class="subheading">Products</h5>
                <ul class="product_list list-unstyled">
                    <li>
                        <a href="#" class="sproduct_box d-flex gap-3 gap-md-4">
                            <div class="product_img">
                                <img src="images/product_img1.jpg" alt="product title" class="img-fluid" />
                            </div>
                            <div class="product_content flex-grow-1">
                                <h4>Alicia Dress</h4>
                                <div class="price">
                                    <del>$13.00</del>
                                    <ins>$13.00</ins>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sproduct_box d-flex gap-3 gap-md-4">
                            <div class="product_img">
                                <img src="images/product_img2.jpg" alt="product title" class="img-fluid" />
                            </div>
                            <div class="product_content flex-grow-1">
                                <h4>Alicia Dress</h4>
                                <div class="price">
                                    <del>$13.00</del>
                                    <ins>$13.00</ins>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sproduct_box d-flex gap-3 gap-md-4">
                            <div class="product_img">
                                <img src="images/product_img3.jpg" alt="product title" class="img-fluid" />
                            </div>
                            <div class="product_content flex-grow-1">
                                <h4>Alicia Dress</h4>
                                <div class="price">
                                    <del>$13.00</del>
                                    <ins>$13.00</ins>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sproduct_box d-flex gap-3 gap-md-4">
                            <div class="product_img">
                                <img src="images/product_img11.jpg" alt="product title" class="img-fluid" />
                            </div>
                            <div class="product_content flex-grow-1">
                                <h4>Alicia Dress</h4>
                                <div class="price">
                                    <del>$13.00</del>
                                    <ins>$13.00</ins>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sproduct_box d-flex gap-3 gap-md-4">
                            <div class="product_img">
                                <img src="images/product_img2.jpg" alt="product title" class="img-fluid" />
                            </div>
                            <div class="product_content flex-grow-1">
                                <h4>Alicia Dress</h4>
                                <div class="price">
                                    <del>$13.00</del>
                                    <ins>$13.00</ins>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>

                <div class="searched_box d-flex align-items-center justify-content-between gap-4 py-3 px-4 bg-light rounded-3">
                    <div>Search for "<span class="text-underline">d</span>"</div>
                    <span class="fa-solid fa-arrow-right"></span>
                </div>
            </div>
        </div>
    </div>
     <!--JS Files -->
    <script src="{{ asset('assets/frontend/js/font-awesome-all.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
</body>
</html>