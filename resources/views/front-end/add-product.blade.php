<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Add Product</title>


  <!-- Import Template Icons CSS Files -->
  <link rel="stylesheet" href="{{ asset('front-end') }}/assets/css/font-awesome.min.css">

  <!-- Import Perfect ScrollBar CSS Files -->
  <link rel="stylesheet" href="{{ asset('front-end') }}/assets/css/perfect-scrollbar.css">

  <!-- Import Bootstrap CSS File -->

  <link rel="stylesheet" href="{{ asset('front-end') }}/assets/css/bootstrap.min.css">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">

  <!-- Import Template's CSS Files -->
  <link rel="stylesheet" href="{{ asset('front-end') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ asset('front-end') }}/assets/css/responsive.css">
  <link rel="stylesheet" href="{{ asset('front-end') }}/assets/css/index-01.css">
</head>
<body>
    <div class="content-wrapper container-fluid">
     @include('front-end.admin-menu')

    <div class="dashboard-contents">
      <div class="contents-inner">
        <div class="row">
          <div class="col-12">
              @if(Session::get('message'))
              <div class="alert alert-success" id="message">
                  <h4 class=" text-center text-success"> {{ Session::get('message') }}</h4>
              </div>
          @endif
          <div class=" card card-default">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <div class="section-content">
              <div class="content-head">
                <h4 class="content-title">Add Products </h4><!-- /.content-title -->
              </div><!-- /.content-head -->
            <form action="{{ route('save-product-info') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="content-details show">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group profile-form">
                      <label class="form-control-label">Product Name</label>
                      <div class="input-group">
                        <input class="form-control" type="text" name="p_name">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group profile-form">
                      <label class="form-control-label">Price</label>
                      <div class="input-group">
                        <input class="form-control" type="text" name="price">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group profile-form">
                      <label class="form-control-label">Auction Id</label>
                      <div class="input-group">
                        <input class="form-control" type="text" name="auction_id">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group profile-form">
                      <label class="form-control-label">Auction Credit</label>
                      <div class="input-group">
                        <input class="form-control" type="text" name="auction_credit">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group profile-form">
                      <label class="form-control-label">Bid Amount</label>
                      <div class="input-group">
                        <input class="form-control" type="text" name="bid_amount">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group profile-form">
                      <label class="form-control-label">Add Picture</label>
                      <div class="input-group">
                        <input class="form-control" name="image" type="file">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group profile-form">
                      <label class="form-control-label">Last Date</label>
                      <div class="input-group">
                          <input class="form-control" type="date" name="last_date">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group profile-form">
                      <label class="form-control-label">Product Type</label>
                      <div class="input-group">
                          <select class="form-control" name="p_type"  required="">
                              <option value="">Select Type</option>
                              <option value="Mobile Phone">Mobile Phone</option>
                              <option value="Headphone">Headphone</option>
                              <option value="Phone Cover">Phone Cover</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group profile-form">
                      <label class="form-control-label">Add Description</label>
                      <div class="input-group">
                        <textarea name="description" cols="30" rows="10" class="details"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="submit-button">
                      <button class="submit-btn">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
              </form>
              <!-- /.content-details -->
            </div>
          </div>

        </div>
      </div><!-- /.contents-inner -->

    <footer class="site-footer">
        <div class="copyright">
          <div class="float-left">
            Copyright © 2019 <a href="#" target="_blank"></a>
          </div>

          <div class="float-right">
            Developed with Love by <a href="#" rel="nofollow"></a>
          </div>
        </div><!-- /.copyright -->
      </footer><!-- /.site-footer -->
    </div><!-- /.dashboard-contents -->
  </div>


  <script src="{{ asset('front-end') }}/assets/js/jquery-3.2.1.slim.min.js"></script>
  <script src="{{ asset('front-end') }}/assets/js/plugins.js"></script>
  <script src="{{ asset('front-end') }}/assets/js/tables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('front-end') }}/assets/js/tables/dataTables.bootstrap4.min.js"></script>

  <script src="{{ asset('front-end') }}/assets/js/main.js"></script>

  <script>
    $(document).ready(function() {
      "use strict";

      $('.data-table').DataTable();
    });
  </script>


</body>

<!-- Mirrored from demos.jeweltheme.com/hi5dash/demo/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Jan 2019 19:01:56 GMT -->
</html>
