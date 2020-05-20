<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/PubUser/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  {{-- <link rel="stylesheet" href="/PubUser/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="/PubUser/dist/css/adminlte.min.css">
  <!-- iCheck -->
  {{-- <link rel="stylesheet" href="/PubUser/plugins/iCheck/flat/blue.css"> --}}
  <!-- Morris chart -->
  {{-- <link rel="stylesheet" href="/PubUser/plugins/morris/morris.css"> --}}
  <!-- jvectormap -->
  {{-- <link rel="stylesheet" href="/PubUser/plugins/jvectormap/jquery-jvectormap-1.2.2.css"> --}}
  <!-- Date Picker -->
  {{-- <link rel="stylesheet" href="/PubUser/plugins/datepicker/datepicker3.css"> --}}
  <!-- Daterange picker -->
  {{-- <link rel="stylesheet" href="/PubUser/plugins/daterangepicker/daterangepicker-bs3.css"> --}}
  <!-- bootstrap wysihtml5 - text editor -->
  {{-- <link rel="stylesheet" href="/PubUser/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> --}}
  <!-- Google Font: Source Sans Pro -->
  {{-- <link href="/PubUser/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
  <style>
    .s-n{
      padding:10px !important;
    }
    .j-time{
      direction: ltr !important;
      
    }
    .brand-logo-c{
      float: left;
      margin-left: 10px;
      font-size: 25px;
    }
  </style>
  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="/PubUser/dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="/PubUser/dist/css/custom-style.css">

  {{-- Alert Javascript Library --}}
  <script src="{{ asset('PubAdmin/js/AlertPlugin/sweetalert.js') }}"></script>
  <!-- jQuery -->
  <script src="/PubUser/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Top Navigation !-->
        @include('layouts.UserPanel.Navigation')
    
    <!-- Aside Menu !-->
        @include('layouts.UserPanel.Menu')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) Start -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">پنل کاربری</a></li>
                @yield('breadcrumb')
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('TitleContent')</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Content-Header End -->

    {{-- Main content Start --}}
    <section class="content">
      <div class="container-fluid">
            @yield('UserContent')
      </div>
    </section>
        {{-- Main Content End --}}

  </div>
  <!-- Content Wrapper. Contains page content -->
    
  

  @include('layouts.UserPanel.footer')