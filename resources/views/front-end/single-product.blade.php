<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Single Product Page</title>
    <link rel="stylesheet" href="{{ asset('front-end') }}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front-end') }}/css/vendor/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-end') }}/style.css">
</head>
<body>
    @include('front-end.menu')

    <section id="bid-product-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3"></div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="bid-product">
                        <div class="product-image">
                            <img src="{{ asset('front-end') }}/img/3.jpg" alt="">
                        </div>
                        <div class="product-description">
                            <p>Device name : Samsung Galaxy Dous</p>
                            <p>Price in BDT 1000</p>
                            <p>Bid Price : 800</p>
                            <p>Credit : 2X</p>
                            <p>Auction Id : bc302</p>
                            <p>Bid Status : Avaiable</p>
                        </div>
                        <div class="your-bid">
                            <label for="your-bid">Enter Your Bid Price : </label>
                            <input type="text" placeholder="Enter Your Bid Price" id="your-bid">
                            <div class="bid-btn">
                                <a href="#">Bid Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3"></div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="footer">
                        <div class="copyright">
                            <p>Copyright &copy; by Noman Sadick</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{ asset('front-end') }}/js/vendor/popper.min.js"></script>
    <script src="{{ asset('front-end') }}/js/vendor/jquery.easing.min.js"></script>
    <script src="{{ asset('front-end') }}/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('front-end') }}/js/vendor/jquery.min.js"></script>
</body>
</html>