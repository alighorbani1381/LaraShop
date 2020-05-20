$(document).ready(function(){

    $('.add-to-wish-list').click(function(){
        var productId=$(this).parent('.add-to-links').siblings('.add-to-basket').length;

        if(productId != 0)
            productId=$(this).parent('.add-to-links').siblings('.add-to-basket').attr('data-id');
        else
            productId= $(this).attr('data-id');

        if(productId != "")
             $.ajax({
            url:'/wishlist',
            type:'post',
            dataType:'json',
            data:{ product : productId },
            success:function(data){
                if(data.result == 'add'){
                    var newCount=" لیست علاقه مندی ها " + '(' + data.count + ')';
                    $('#wish-count').hide().text(newCount).fadeIn();
                    Swal.fire({
                        icon: 'success',
                        title: 'نتیجه',
                        text: 'با موفقیت به لیست علاقه مندی ها اضافه شد',
                        confirmButtonText: 'مرسی',
                    });
                }
                else
                Swal.fire({
                    icon: 'warning',
                    title: 'درخواست تکراری',
                    text: 'این محصول رو قبلا اضافه کردی !',
                    confirmButtonText: 'عه 😅',
                });
            }
                });
    });


    $('.remove-wish-product').click(function(){
        var wishId=$(this).attr('data-id');
        var targetURL='/wishlist/'+wishId;
        if(wishId != "")
             $.ajax({
                    url:targetURL,
                    type:'post',
                    dataType:'json',
                    data:{_method:'DELETE', wishlist : wishId},
                    success:function(data)
                    {
                         if(data.remove == 'OK'){
                             var targetElem='.remove-wish-product[data-id=' + data.deleted +']'
                             $(targetElem).parents('tr').fadeOut();
                             var countOfWish=$(targetElem).parents('tr').siblings('tr').length;
                             var newCount=" لیست علاقه مندی ها " + '(' + countOfWish + ')';
                             
                             if(countOfWish == 0)
                             {
                                 var message='<div class="alert alert-info"><i class="fa fa-info-circle"></i> تا کنون محصولی را به لیست علاقه مندی خود اضافه نکرده اید</div>';
                                 $('#wish-table').fadeOut();
                                 setTimeout(function(){
                                     $('#wish-holder').hide().append(message).fadeIn();
                                     $('#wish-count').hide().text(" لیست علاقه مندی ها " + "(0)").fadeIn();
                                 },600);
                             }else
                                $('#wish-count').hide().text(newCount).fadeIn();
                             

                         }else if(data.remove == 'NO'){
                             alert('مشکلی پیش آمده مجددا صفحه را رفرش کنید');
                         }
                             
                    }
             });
    });



});