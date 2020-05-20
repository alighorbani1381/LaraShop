@if($relatedProducts->count() != 0)
<h3 class="subtitle">محصولات مرتبط</h3>
<div class="owl-carousel related_pro">
  @foreach ($relatedProducts as $relatedProduct)    
    <div class="product-thumb">
    <div class="image"><a href="{{ route('product.show', $relatedProduct->name) }}"><img src="{{ $relatedProduct->image }}" alt="{{ $relatedProduct->name }}" title="{{ $relatedProduct->name }}" class="img-responsive" /></a></div>
        
    <div class="caption">
          <h4><a href="{{  route('product.show', $relatedProduct->name) }}">{{ $relatedProduct->name }}</a></h4>
          <p class="price">
            @if($relatedProduct->discount > 0)
             <span class="price-new">{{ number_format($relatedProduct->dis_price) }} تومان</span>
             <span class="price-old">{{ number_format($relatedProduct->price) }} تومان</span>
             <span class="saving">{{ $relatedProduct->discount }}%</span>
             @else
             <span class="price-new">{{ number_format($relatedProduct->dis_price) }} تومان</span>
             @endif
          </p>

          <div class="rating"> 
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> 
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> 
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> 
         </div>

    </div>

        <div class="button-group">

          @if($relatedProduct->status != 1 || $relatedProduct->total < 2)
            <button type="button" id="button-cart" class="btn-primary basket-deactive" title="محصول موجود نمی باشد" style="width:max-content;height:max-content; border-radius:5px;">افزودن به سبد</button>
          @else
          <button type="button" id="button-cart" class="btn btn-primary add-to-basket" data-id="{{ $relatedProduct->id }}" title="برای افزودن به سبد کلیک کنید">افزودن به سبد خرید</button>
            @endif
            
          <div class="add-to-links">
            <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
            <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
          </div>

        </div>

      </div>
    @endforeach
</div>
@endif