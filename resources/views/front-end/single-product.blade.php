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
                            <img src="{{ asset($product->image) }}" alt="">
                        </div>
                        <div class="product-description">
                        <p>Device name : {{ $product->p_name }}</p>
                            <p>Price in BDT {{ $product->price }}</p>
                            <p>Bid Price : {{ $product->bid_amount }}</p>
                            <p>Credit : {{ $product->auction_credit }}</p>
                            <p>Auction Id : {{ $product->auction_id }}</p>
                            <p>Bid Status : 
                                @if (Carbon\Carbon::now()->toDateString()===$product->last_date)
                                    {{ $product->last_date }}
                                    
                                @elseif(Carbon\Carbon::now()>$product->last_date)
                                Expired
                                @else 
                                     {{$product->last_date }}
                                @endif
                            </p>
                        </div>
                        <div class="your-bid">

                                @if(Session::get('message'))
                                <div class="alert alert-success" id="message">
                                    <h4 class=" text-center text-success"> {{ Session::get('message') }}</h4>
                                </div>
                            @endif
                           
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                <form action="{{ route('bid-now') }}" method="POST">
                            @csrf
                            <label for="your-bid">Enter Your Bid Price : </label>
                            <input type="text" name="bid_price" placeholder="Enter Your Bid Price" id="your-bid">
                        <input type="hidden" name="p_id" value="{{ $product->id }}">
                            <div class="bid-btn">
                                <input type="submit" class="btn btn-info" value="Bid Now" />
                            </div>
                        </form>
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