<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bidding System</title>
    <link rel="stylesheet" href="{{ asset('front-end') }}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front-end') }}/css/vendor/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-end') }}/style.css">
</head>
<body>
        @include('front-end.menu')
    {{-- <header>
        <nav class="navbar navbar-expand-lg">
            <div class="navbar-brand">
              <a class="logo js-scroll-trigger" href="{{ route('/')}}">Bididng System</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link active" href="{{ route('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.html">Register</a>
                    </li>
                </ul>
          </div>
        </nav>
    </header> --}}

    <section id="category">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="category">
                        <select name="category" id="">
                            <option value="mobile">Mobile Phone</option>
                            <option value="mobile">Phone Cover</option>
                            <option value="mobile">Pen Drive</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="search-box">
                        <input type="text" placeholder="Search Product">
                        <a href="#" class="submit-button">Search</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="products">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="product-type">
                        <h2>Recent Product</h2>
                    </div>
                </div>
                @foreach ($recent_prodcut as $item)
                    
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                    <h4 class="name"><a href="{{ route('single-product',['id'=>$item->id])}}">{{ $item->p_name }}</a></h4>
                        <div class="price">
                            <p>BDT: {{ $item->price }}</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset($item->image) }}" alt="">
                        </div>
                        <div class="auction-id-credit">
                        <span class="action-id">AID : {{ $item->auction_id }}</span>
                        <span class="credit">{{ $item->auction_credit }}</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ {{ $item->bid_amount }} </p>
                            <p class="status">
                            
                            @if (Carbon\Carbon::now()->toDateString()===$item->last_date)
                                {{ $item->last_date }}
                                
                            @elseif(Carbon\Carbon::now()>$item->last_date)
                            Expired
                            @else 
                                 {{$item->last_date }}
                            @endif </p>
                        </div>
                        <div class="bid-btn">
                            <a href="{{ route('single-product',['id'=>$item->id])}}">Bid Now</a>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                        <h4 class="name"><a href="#">Samsung A8 Cover</a></h4>
                        <div class="price">
                            <p>BDT: 300</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset('front-end') }}/img/4.jpg" alt="">
                        </div>
                        <div class="auction-id-credit">
                            <span class="action-id">AID : mc201</span>
                            <span class="credit">2X</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ 200 </p>
                            <p class="status">Expired</p>
                        </div>
                        <div class="bid-btn">
                            <a href="#">Bid Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                        <h4 class="name"><a href="#">Xtreme Head Phone s-811</a></h4>
                        <div class="price">
                            <p>BDT: 800</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset('front-end') }}/img/7.jpg" alt="">
                        </div>
                        <div class="auction-id-credit">
                            <span class="action-id">AID : hc201</span>
                            <span class="credit">3X</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ 700 </p>
                            <p class="status">Expired</p>
                        </div>
                        <div class="bid-btn">
                            <a href="#">Bid Now</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <section id="products">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="product-type">
                        <h2>Mobile Phone</h2>
                    </div>
                </div>

                 @foreach ($pns as $item)
                    
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                    <h4 class="name"><a href="{{ route('single-product',['id'=>$item->id])}}">{{ $item->p_name }}</a></h4>
                        <div class="price">
                            <p>BDT: {{ $item->price }}</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset($item->image) }}" alt="">
                        </div>
                        <div class="auction-id-credit">
                        <span class="action-id">AID : {{ $item->auction_id }}</span>
                        <span class="credit">{{ $item->auction_credit }}</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ {{ $item->bid_amount }} </p>
                            <p class="status">
                            
                            @if (Carbon\Carbon::now()->toDateString()===$item->last_date)
                                {{ $item->last_date }}
                                
                            @elseif(Carbon\Carbon::now()>$item->last_date)
                            Expired
                            @else 
                                 {{$item->last_date }}
                            @endif </p>
                        </div>
                        <div class="bid-btn">
                            <a href="{{ route('single-product',['id'=>$item->id])}}">Bid Now</a>
                        </div>
                    </div>
                </div>
                @endforeach


                {{-- <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                        <h4 class="name"><a href="#">Lg</a></h4>
                        <div class="price">
                            <p>BDT: 900</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset('front-end') }}/img/2.jpg" alt="">
                        </div>
                        <div class="auction-id-credit">
                            <span class="action-id">AID : bc202</span>
                            <span class="credit">2X</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ 700 </p>
                        </div>
                        <div class="bid-btn">
                            <a href="#">Bid Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                        <h4 class="name"><a href="#">Nokia</a></h4>
                        <div class="price">
                            <p>BDT: 700</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset('front-end') }}/img/3.jpg" alt="">
                        </div>
                        <div class="auction-id-credit">
                            <span class="action-id">AID : bc302</span>
                            <span class="credit">2X</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ 500 </p>
                        </div>
                        <div class="bid-btn">
                            <a href="#">Bid Now</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <section id="products">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="product-type">
                        <h2>Phone Cover</h2>
                    </div>
                </div>
                @foreach ($pn_covers as $item)
                    
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                    <h4 class="name"><a href="{{ route('single-product',['id'=>$item->id])}}">{{ $item->p_name }}</a></h4>
                        <div class="price">
                            <p>BDT: {{ $item->price }}</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset($item->image) }}" alt="">
                        </div>
                        <div class="auction-id-credit">
                        <span class="action-id">AID : {{ $item->auction_id }}</span>
                        <span class="credit">{{ $item->auction_credit }}</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ {{ $item->bid_amount }} </p>
                            <p class="status">
                            
                            @if (Carbon\Carbon::now()->toDateString()===$item->last_date)
                                {{ $item->last_date }}
                                
                            @elseif(Carbon\Carbon::now()>$item->last_date)
                            Expired
                            @else 
                                 {{$item->last_date }}
                            @endif </p>
                        </div>
                        <div class="bid-btn">
                            <a href="{{ route('single-product',['id'=>$item->id])}}">Bid Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                        <h4 class="name"><a href="#">Samsung A8 Cover</a></h4>
                        <div class="price">
                            <p>BDT: 300</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset('front-end') }}/img/4.jpg" alt="">
                        </div>
                        <div class="auction-id-credit">
                            <span class="action-id">AID : mc201</span>
                            <span class="credit">2X</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ 200 </p>
                            <p class="status">Expired</p>
                        </div>
                        <div class="bid-btn">
                            <a href="#">Bid Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                        <h4 class="name"><a href="#">Xiaomi Cover</a></h4>
                        <div class="price">
                            <p>BDT: 500</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset('front-end') }}/img/5.jpg" alt="">
                        </div>
                        <div class="auction-id-credit">
                            <span class="action-id">AID : bc202</span>
                            <span class="credit">3X</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ 400 </p>
                        </div>
                        <div class="bid-btn">
                            <a href="#">Bid Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                        <h4 class="name"><a href="#">Nokia Phone Cover</a></h4>
                        <div class="price">
                            <p>BDT: 300</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset('front-end') }}/img/6.jpg" alt="">
                        </div>
                        <div class="auction-id-credit">
                            <span class="action-id">AID : bc302</span>
                            <span class="credit">3X</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ 200 </p>
                        </div>
                        <div class="bid-btn">
                            <a href="#">Bid Now</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <section id="products">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="product-type">
                        <h2>Headphone</h2>
                    </div>
                </div>
                @foreach ($headphones as $item)
                    
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                    <h4 class="name"><a href="{{ route('single-product',['id'=>$item->id])}}">{{ $item->p_name }}</a></h4>
                        <div class="price">
                            <p>BDT: {{ $item->price }}</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset($item->image) }}" alt="">
                        </div>
                        <div class="auction-id-credit">
                        <span class="action-id">AID : {{ $item->auction_id }}</span>
                        <span class="credit">{{ $item->auction_credit }}</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ {{ $item->bid_amount }} </p>
                            <p class="status">
                            
                            @if (Carbon\Carbon::now()->toDateString()===$item->last_date)
                                {{ $item->last_date }}
                                
                            @elseif(Carbon\Carbon::now()>$item->last_date)
                            Expired
                            @else 
                                 {{$item->last_date }}
                            @endif </p>
                        </div>
                        <div class="bid-btn">
                            <a href="{{ route('single-product',['id'=>$item->id])}}">Bid Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                        <h4 class="name"><a href="#">Xtreme Head Phone s-811</a></h4>
                        <div class="price">
                            <p>BDT: 800</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset('front-end') }}/img/7.jpg" alt="">
                        </div>
                        <div class="auction-id-credit">
                            <span class="action-id">AID : hc201</span>
                            <span class="credit">3X</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ 700 </p>
                            <p class="status">Expired</p>
                        </div>
                        <div class="bid-btn">
                            <a href="#">Bid Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                        <h4 class="name"><a href="#">Huawei Super Bass Ear head phone</a></h4>
                        <div class="price">
                            <p>BDT: 500</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset('front-end') }}/img/8.jpg" alt="">
                        </div>
                        <div class="auction-id-credit">
                            <span class="action-id">AID : hc202</span>
                            <span class="credit">3X</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ 400 </p>
                        </div>
                        <div class="bid-btn">
                            <a href="#">Bid Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="product">
                        <h4 class="name"><a href="#">Bluetooth Head Phone P47</a></h4>
                        <div class="price">
                            <p>BDT: 900</p>
                        </div>
                        <div class="feature-image">
                            <img src="{{ asset('front-end') }}/img/9.jpg" alt="">
                        </div>
                        <div class="auction-id-credit">
                            <span class="action-id">AID : hc302</span>
                            <span class="credit">4X</span>
                        </div>
                        <div class="bid-status">
                            <p class="bid-price">৳ 800 </p>
                        </div>
                        <div class="bid-btn">
                            <a href="#">Bid Now</a>
                        </div>
                    </div>
                </div> --}}
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