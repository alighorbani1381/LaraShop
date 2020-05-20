

<!-- Left Part Start (Aside) -->
<aside id="column-left" class="col-sm-3 hidden-xs">

    <!-- Categories Start Part !-->
    <h3 class="subtitle">دسته ها</h3>
    <div class="box-category">
        <ul id="cat_accordion">
            @foreach ($categories as $category)
                <li>
                    <a href="#">{{ $category->title }}</a>
                    @if($category->sub_categories->count() != 0)
                        <span class="down"></span>
                        <ul>
                            @foreach($category->sub_categories as $subCategory)
                                <li>
                                    <a href="{{ route('category.product', $subCategory->title) }}">
                                        {{ $subCategory->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    <!-- Categories End Part !-->

    <!-- Best Seler Start Part  !-->
    <h3 class="subtitle">پرفروش ها</h3>
    <div class="side-item">
        @foreach($bestSelers as $bestSeler)
            <div class="product-thumb clearfix">
                <div class="image">
                    <a href="{{ route('products.show', $bestSeler->name) }}"><img src="{{ $bestSeler->image }}" alt="*" title="{{ $bestSeler->name }}" class="img-responsive" /></a>
                </div>
                <div class="caption">
                    <h4><a href="{{ route('products.show', $bestSeler->name) }}">{{ $bestSeler->name }}</a></h4>
                    <p class="price">
                        @if($bestSeler->discount != 0)
                        <span class="price-new">{{ number_format($bestSeler->dis_price) }} تومان</span> 
                        <span class="price-old">{{ $bestSeler->std_price }} تومان</span> 
                        <span class="saving">%{{ $bestSeler->discount }}</span>
                        @else
                        <span class="price-new">{{ $bestSeler->std_price }} تومان</span> 
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Best Seler Start End  !-->

    <!-- Special Product Start Part  !-->
    <h3 class="subtitle">ویژه</h3>
    <div class="side-item">
        @foreach($specialProducts as $specialProduct)
            <div class="product-thumb clearfix">
                <div class="image">
                    <a href="{{ route('products.show', $specialProduct->name) }}"><img src="{{ $specialProduct->image }}" alt="*" title="{{ $specialProduct->name }}" class="img-responsive" /></a>
                </div>
                <div class="caption">
                    <h4><a href="{{ route('products.show', $specialProduct->name) }}">{{ $specialProduct->name }}</a></h4>
                    <p class="price">
                        @if($specialProduct->discount != 0)
                        <span class="price-new">{{ number_format($specialProduct->dis_price) }} تومان</span>
                        <span class="price-old">{{ $specialProduct->std_price }} تومان</span>
                        <span class="saving">%{{ $specialProduct->discount }}</span> 
                        @else
                        <span class="price-new">{{ number_format($specialProduct->dis_price) }} تومان</span>
                        @endif 
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Special Product End Part  !-->

    <!-- About US Side Start !-->
    <div class="list-group">
        <h3 class="subtitle">درباره ما</h3>
        <p>متنی راجع به این فروشگاه در اینجا نوشته خواهد شد</p>
    </div>
    <!-- About US Side End !-->

</aside>
<!-- Left Part End (Aside) -->

