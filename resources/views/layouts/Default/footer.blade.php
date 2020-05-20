
{{-- JavaScript Code Inject Start --}}
@if(session()->has('sendTicketEmail'))
<script>
  $(document).ready(function(){
    Swal.fire({
      icon: 'success',
      title: 'تیکت شما ثبت شد',
      text: 'پس از بررسی نتیجه آن به شما ایمیل میگردد پیشنهاد میکنم قسمت سوالات متداول رو هم یه بررسی بکن 🥰',
      confirmButtonText: 'اوکی گرفتم',
    });
  });
</script>
@endif
{{-- JavaScript Code Inject End --}}

<!--Footer Start-->
<footer id="footer">
    <div class="fpart-first">
      <div class="container">
        <div class="row">
          <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h5>اطلاعات تماس</h5>
            <ul>
              <li class="address"><i class="fa fa-map-marker"></i>اصفهان ، همین حوالی</li>
              <li class="mobile"><i class="fa fa-phone"></i>09162913781</li>
              <li class="email"><i class="fa fa-envelope"></i>برقراری ارتباط از طریق <a href="contact-us.html">تماس با ما</a>
            </ul>
          </div>
          <div class="column col-lg-3 col-md-2 col-sm-3 col-xs-12">
            <h5>اطلاعات</h5>
            <ul>
              <li><a href="about-us.html">درباره ما</a></li>
              <li><a href="{{ route('faq') }}">سوالات متداول</a></li>
              <li><a href="about-us.html">حریم خصوصی</a></li>
              <li><a href="about-us.html">شرایط و قوانین</a></li>
            </ul>
          </div>
          <div class="column col-lg-3 col-md-2 col-sm-3 col-xs-12">
            <h5>خدمات مشتریان</h5>
            <ul>
              <li><a href="{{ route('contact.us')}}">تماس با ما</a></li>
              <li><a href="#">بازگشت</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>حساب من</h5>
            <ul>
              <li><a href="{{ route('profile.index')}}">حساب کاربری</a></li>
              <li><a href="#">تاریخچه سفارشات</a></li>
              <li><a href="{{ route('wishlist.index')}}">لیست علاقه مندی</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="fpart-second">
      <div class="container">
        <div id="powered" class="clearfix">
          <div class="powered_text pull-left flip">
            <p> برنامه نویسی شده توسط | علی قربانی © </p>
          </div>
          <div class="social pull-right flip"> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/Default/image/socialicons/facebook.png" alt="Facebook" title="Facebook"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/Default/image/socialicons/twitter.png" alt="Twitter" title="Twitter"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/Default/image/socialicons/google_plus.png" alt="Google+" title="Google+"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/Default/image/socialicons/pinterest.png" alt="Pinterest" title="Pinterest"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/Default/image/socialicons/rss.png" alt="RSS" title="RSS"> </a> </div>
        </div>
        <div class="bottom-row">
          <div class="custom-text text-center">
            <p>
                این فروشگاه رو با هدف بررسی توانایی های خودم به چالش کشیدن اون ها درست کردم قسمت های مختلفی که با پنل مدیریتی اختصاصی که این قالب داره میتونید هر گونه محصولی رو در اون بفروشید و از بیزنس آنلاین خودتون لذت ببرید.              
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="back-top"><a data-toggle="tooltip" title="بازگشت به بالا" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
  </footer>
  <!--Footer End-->
  
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="/Default/js/bootstrap/js/bootstrap.min.js"></script>
{{-- <script type="text/javascript" src="/Default/js/jquery.easing-1.3.min.js"></script> --}}
<script type="text/javascript" src="/Default/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="/Default/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/Default/js/custom.js"></script>
<!-- JS Part End-->
</body>
</html>