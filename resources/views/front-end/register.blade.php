<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('front-end') }}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front-end') }}/css/vendor/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-end') }}/style.css">
</head>
<body>
    @include('front-end.menu')

    <section id="login-page">
        <div class="container">
            <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3"></div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                    <form action="{{ route('user-register') }}" method="POST" class="login-page">
                            @csrf
                            <label for="fisrt-name">First Name</label>
                            <input type="text" placeholder="Fisrt Name" name="fname" id="fisrt-name">
                            <label for="last-name">Last Name</label>
                            <input type="text" placeholder="Last Name" name="lname" id="last-name">
                            <label for="email">Email</label>
                            <input type="email" placeholder="Enter your email" name="email" id="email">
                            <label for="password">Password</label>
                            <input type="text" placeholder="Password" name="password" id="password">
                            <label for="password">Confirm Password</label>
                            <input type="text" placeholder="Confirm Password" name="password_confirmation" id="password">
                            <label for="mobile">Mobile</label>
                            <input type="text" placeholder="Enter your mobile number" name="phone_no" id="mobile">
                            <div class="buyer">
                                <div class="control">
                                    <h5>Do you want to be buyer? </h5>
                                    <label class="radio">
                                      <input type="radio" name="answer" value="Buyer">
                                      Yes
                                    </label>
                                    <label class="radio">
                                      <input type="radio" name="answer" value="Seller">
                                      No
                                    </label>
                                  </div>
                            </div>
                            <button class="submit">Register</button>
                            <div class="text">
                                <p>All Ready a member? <a href="{{ route('user-login') }}">Login</a></p>
                            </div>
                        </form>
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