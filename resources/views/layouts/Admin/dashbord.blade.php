<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <title>
	@yield('title')
	</title>
    <!-- Bootstrap & Panel CSS File -->
    <link rel="stylesheet" href="/css/PanelAdminBootStrap.css">    
    <link rel="stylesheet" href="/css/PanelAdmin.css">    
    <link rel="stylesheet" href="/css/PanelAdmin-custom.css">    
    <link rel="stylesheet" href="{{ asset('PubAdmin/assets/font-awesome/css/font-awesome.css') }}">

    <!-- Pretty Checkbox CSS File & It's Icon -->
    <link rel="stylesheet" href="{{ asset('PubAdmin/MaterialDesign/css/CheckBox.css') }}">
    <link rel="stylesheet" href="{{ asset('PubAdmin/MaterialDesign/css/materialdesignicons.css') }}">
    <script src="/js/PanelAdmin-custom.js"></script>
     @stack('script')

     <!-- Load jQuery Icon Js File !-->
     <script src="{{ asset('PubAdmin/js/liveicon/jquery-1.9.1.min.js') }}"></script> 
     @stack('CustomScript')
    <script>
      $(window).load(function(){
        setTimeout(function(){
          $('.preloader').fadeOut('slow');
        }, 500);
          
      });
    </script>
</head>
<body>
  <div class="preloader"></div>



<section id="container" class="">

			<!--header start-->
				@include('layouts.Admin.header')
			<!--header end-->


			<!--sidebar start-->
					@include('layouts.Admin.menu')
			 <!-- sidebar menu end-->
			 

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
			
	
                <!-- page start-->
              @yield('content')
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>
	
    <!-- js placed at the end of the document so the pages load faster -->
  <script src="/js/PanelAdmin.js"></script>
</body>
</html>
