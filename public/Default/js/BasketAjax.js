//Document (Code) Structure
$(document).ready(function() {

    //Set Number format function Like a PHP
    function formatPrice(number){
		var numFormat = number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
		return numFormat;
    }
    
    //Setup Ajax (CSRF Token Laravel)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Reset Basket HTML (Give Data From Server)
    function resetBasketView(data) {
        var finalPrice = formatPrice(data.price - data.disValue);
        $("#cart-total").hide().text(data.count + " محصول - " + (finalPrice) + " تومان ").fadeIn('fast');
        $("#basket-header").html(data.product);
        $("#final-basket-total-price").text(formatPrice(data.price) + " تومان ");
        $("#final-basket-disValue").text(formatPrice(data.disValue) + " تومان ");
        $("#final-basket-price").text(finalPrice  + " تومان ");
    }

    /* Add To Basket  Start */
    $(".add-to-basket").click(function() {
        var productId = $(this).attr('data-id');

        $.ajax({
            url: '/basket/add',
            type: 'post',
            dataType: 'json',
            data: { pro_id: productId },
            success: function(data) {
                if (data.successful == "OK" && data.status == "count") {
                    Swal.fire({
                        icon: 'info',
                        title: 'نتیجه',
                        text: 'این محصول در سبد خرید شما وجود داشت و یکی به آن اضافه شد',
                        confirmButtonText: 'مرسی',
                    });
                    resetBasketView(data);
                    /* Change Count of Product From Aside and Change All Price */

                } else if (data.successful == "OK" && data.status == "add") {
                    Swal.fire({
                        icon: 'success',
                        title: 'نتیجه',
                        text: 'محصول با موفقیت به سبد خرید شما اضافه شد',
                        confirmButtonText: 'مرسی',
                    });
                    var newBasketCount=' سبد خرید ' + '(' + data.count + ')';
                    $('#basket-count').hide().text(newBasketCount).fadeIn();
                    resetBasketView(data);

                } else {
                    alert("تعداد سفارش شما بیشتر از موجودی انبار است");
                }



            }
        });


    });
    /* Add To Basket  End */

    // Change Data From Baket Start

    $('.change-count').bind('keyup input change', function() {
        var count = parseInt($(this).val());

        
        var limitCount = parseInt($(this).attr('data-limit'));
        if (count > limitCount)
            $(this).val(limitCount);
        else if (count <= 0)
            $(this).val(1);
        else {
            var discountValue = 0;
            var staticPrice = $(this).attr('data-static-price');
            var productDiscount = $(this).attr('data-discount');
            var finalCount = parseInt(staticPrice * count);
            $(this).attr('data-final-price', finalCount);
            var finalCountTag = $(this).parent().parent().siblings('.final-count');
            finalCountTag.text(formatPrice(finalCount) + " تومان ").fadeIn('fast');

            //Calculate Discount and Set Discount Value (Offer Price)
            if (productDiscount != 0)
                finalPay = ((100 - productDiscount) / 100) * finalCount;
            else
                finalPay = productDiscount * finalCount;

            $(this).parent().parent().siblings('.final-pay').text(formatPrice(finalPay) + " تومان ");



            /* Reset Sum All Product */
            var sumAll = 0;
            var discountValue = 0;
            var discountAll = 0;
            $('.change-count').each(function() {


                var count = $(this).val();
                var productDiscount = $(this).attr('data-discount');
                var staticPriceSum = $(this).attr('data-static-price');
                var finalCountSum = parseInt(staticPriceSum * count);


                sumAll = parseInt(sumAll + finalCountSum);
                $("#sum-all").text(formatPrice(sumAll) + " تومان ");

                //Calculate Discount and Set Discount Value (Offer Price)
                if (productDiscount != 0)
                    discountValue = (productDiscount / 100) * staticPriceSum;
                else
                    discountValue = productDiscount;


                discountAll = parseInt(discountAll + (discountValue * count));
                $("#sum-discount").text(formatPrice(discountAll) + " تومان ");

                var finalPay = sumAll - discountAll;
                $("#sum-pay").text(formatPrice(finalPay) + " تومان ");


            });

            //Set Parameters From input Tag (For Server) 
            var key = '#' + 'count' + '-' + $(this).attr('data-key');
            $(key).val(count);

        }
    });

    // Change Data From Baket End


    /* Search Product Start*/
    $("#filter_name").bind('input change focus', function() {
        var searchTxt = $(this).val();

        if (searchTxt != "" && searchTxt != " ") {
            $.ajax({
                url: '/product/search',
                type: 'GET',
                data: { search: searchTxt },
                dataType: 'json',
                success: function(data) {
                    var searchBox = $('#search-wrapper');
                    if (data.successfuly == 'true') {
                        searchBox.text("");
                        searchBox.css(['opcatity:1']);
                        searchBox.fadeIn();
                        for (var i = 0; i < data.products.length; i++) {
                            searchBox.append('<p class="search-wrapper-result" ><a href="http://localhost:8000/products/' + data.products[i].name +'">' + data.products[i].name + '</a></p>');
                        }

                    } else
                        searchBox.html('<p class="search-wrapper-result" >موردی پیدا نشد</p>');
                }
            });

        } else if (searchTxt == "") {
            $('#search-wrapper').fadeOut();
        }

    });
    /* Search Product End*/








});