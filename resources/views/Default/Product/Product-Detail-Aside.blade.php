 <!--Right Part Start -->
 <aside id="column-right" class="col-sm-3 hidden-xs">

   @if($bestSelers->count() != 0)
      <h3 class="subtitle">پرفروش ها</h3>
      <div class="side-item">
          @foreach ($bestSelers as $bestSeler)
              <div class="product-thumb clearfix" style="position:relative;">
                <div class="image"><a href="{{ route('products.show', $bestSeler->name) }}"><img src="/Default/image/product/apple_cinema_30-50x50.jpg" alt="{{ $bestSeler->name }}" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
                  <div class="caption">
                    <h4><a href="{{ route('products.show', $bestSeler->name) }}">{{ $bestSeler->name }}</a></h4>
                      <p class="price">
                        @if($bestSeler->discount != 0)
                          <span class="price-new">{{ number_format($bestSeler->dis_price) }} تومان</span>
                          <span class="price-old">{{ number_format($bestSeler->price) }} تومان</span> 
                          <span class="saving-off">{{ $bestSeler->discount }}%</span>
                          
                        @else
                          <span class="price-new">{{ number_format($bestSeler->dis_price) }}  تومان</span>
                        @endif
                      </p>
                  </div>
              </div>
            @endforeach
      </div>
    @endif
      

    <div class="list-group">
      <h3 class="subtitle">توضیحات محصول</h3>
      <p style="text-align:justify;">{{$product->body}} </p>
    </div>


    @if($specialProducts->count() != 0)
    <h3 class="subtitle">ویژه</h3>
    <div class="side-item">
        @foreach ($specialProducts as $specialProduct)
          <div class="product-thumb clearfix" style="position:relative;">
            <div class="image"><a href="{{ route('products.show', $specialProduct->name) }}"><img src="/Default/image/product/macbook_pro_1-50x50.jpg" alt="{{ $specialProduct->name }}" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="{{ route('products.show', $specialProduct->name) }}">{{ $specialProduct->name }}</a></h4>
                  <p class="price">
                    @if($specialProduct->discount != 0)
                      <span class="price-new">{{ number_format($specialProduct->dis_price) }} تومان</span>
                      <span class="price-old">{{ number_format($specialProduct->price) }} تومان</span> 
                      <span class="saving-off" style="background:#e3b913;">{{ $specialProduct->discount }}%</span>
                    @else
                      <span class="price-new">{{ number_format($specialProduct->dis_price) }}  تومان</span>
                    @endif
                  </p>
              </div>
          </div>
      @endforeach
    </div>
    @endif

  </aside>
  <!--Right Part End -->