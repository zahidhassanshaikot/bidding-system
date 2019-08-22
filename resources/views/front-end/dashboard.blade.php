<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin</title>


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
            <div class="section-content">
              <div class="content-head">
                <h4 class="content-title">All Buyer Information </h4><!-- /.content-title -->
              </div><!-- /.content-head -->

              <div class="content-details show">
                <table id="data-table" class="table data-table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>#No</th>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>01</td>
                      <td>
                        <div class="date">
                          <h6>Md. Jakir Hossain</h6>
                        </div>
                      </td>
                      <td>
                        <div> 
                          <h6>0123242344231</h6>
                        </div>
                      </td>
                      <td>
                        <h6>jakir@gmail.com</h6>
                      </td>
                      <td class="action">
                        <ul>
                          <li><a href="#" target="blank" class="message">Remove Buyer</a></li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <td>02</td>
                      <td>
                        <div class="date">
                          <h6>Md. Russle Ahmed</h6>
                        </div>
                      </td>
                      <td>
                        <div> 
                          <h6>01244342312</h6>
                        </div>
                      </td>
                      <td>
                        <h6>russle@gmail.com</h6>
                      </td>
                      <td class="action">
                        <ul>
                          <li><a href="#" target="blank" class="message">Remove Buyer</a></li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <td>03</td>
                      <td>
                        <div class="date">
                          <h6>Md. Belal Hossain</h6>
                        </div>
                      </td>
                      <td>
                        <div> 
                          <h6>01222333</h6>
                        </div>
                      </td>
                      <td>
                        <h6>belal@yahoo.com</h6>
                      </td>
                      <td class="action">
                        <ul>
                          <li><a href="#" target="blank" class="message">Remove Buyer</a></li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <td>04</td>
                      <td>
                        <div class="date">
                          <h6>Md. Jamal Hossain</h6>
                        </div>
                      </td>
                      <td>
                        <div> 
                          <h6>0123435</h6>
                        </div>
                      </td>
                      <td>
                        <h6>jamal@gmail.com</h6>
                      </td>
                      <td class="action">
                        <ul>
                          <li><a href="#" target="blank" class="message">Remove Buyer</a></li>
                        </ul>
                      </td>
                    </tr>
                  </tbody>

                  <tfoot>
                    <tr>
                        <th>#No</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div><!-- /.content-details -->
            </div>
          </div>

        </div>
      </div><!-- /.contents-inner -->

    <footer class="site-footer">
        <div class="copyright">
          <div class="float-left">
            Copyright © 2018 <a href="#" target="_blank"></a>
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