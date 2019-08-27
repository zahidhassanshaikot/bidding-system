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


    <section id="category">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="category">
                        <select onchange="if (this.value) window.location.href=this.value" name="category" id="searchItem">
                            <option value="">Select Item</option>
                            <option value="{{route('/') }}/search/ddl/Mobile Phone">Mobile Phone</option>
                            <option value="{{route('/') }}/search/ddl/Phone Cover">Phone Cover</option>
                            <option value="{{route('/') }}/search/ddl/Headphone">Headphone</option>
                        </select>
                    </div>
                </div>
            
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="search-box">
                    <form action="{{route('search-product')}}" method="POST">
                        @csrf
                        <input type="text"name="search_string" placeholder="Search Product"> 
                        <button type="submit" class="btn submit-button">Search</button>
                        {{-- <a href="#" class="submit-button">Search</a> --}}
                    </form>
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
                        <h2>Products</h2>
                    </div>
                </div>
                @foreach ($prodcuts as $item)
                    
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