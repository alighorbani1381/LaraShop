$(document).ready(function(){

    

      //Setup Ajax (CSRF Token Laravel)
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".verfy-comment").click(function(){
        
        var commentId=$(this).attr('data-id');
        $.ajax({
            url:'/admin/comment/verify',
            type:'post',
            dataType:'json',
            data:{comment:commentId,},
            success:function(data){

                if(data.successfuly == 'OK'){

                    //Remove Element (Fade & Remove) from Comment Click Accept
                    var selectElem=".verfy-comment[data-id=" + data.comment + ']';
                    var mainElem=$(selectElem).parents('tr');
                    mainElem.slideUp('slow');

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-start',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      });
                      
                      Toast.fire({
                        icon: 'success',
                        title: 'با موفقیت تایید شد'
                      });

                    setTimeout(function(){$(selectElem).parents('tr').remove()}, 500);
                    var countOfBox=$('#comments-waitlist').find('tr').length;
                    if(countOfBox - 2 == 0){
                        $('#comments-waitlist').remove();
                        $('section.panel').hide().append('<div class="alert alert-danger">موردی برای نمایش وجود ندارد</div>').fadeIn();
                    }


                    //Change Value From Top Menu Update information
                    var topMenuComment=$('#header_inbox_bar');
                    var topMenuNum=topMenuComment.find('span.badge');
                    var topMenuNumTxt=topMenuComment.find('p.red');
                    var targetComment= '#header_inbox_bar' + ' '  + 'li[data-id=' + data.comment + ']';
                    var targetCommentElem=topMenuComment.find(targetComment)
                    
                    if(topMenuNum.length != 0)
                    {
                        var newNum=parseInt(topMenuNum.text())-1;
                        topMenuNum.text(newNum.toString());
                        var newNumTxt= 'شما' + '('+ newNum +')' + 'دیدگاه تایید نشده دارید';
                        topMenuNumTxt.hide().text(newNumTxt).fadeIn('fast');
                        
                        //Delete Accepted Comment From Top Menu
                        targetCommentElem.remove();
                    }
                    else
                    {
                        topMenuNum.fadeOut();
                        setTimeout(function(){topMenuNum.remove();},500);
                        var newNumTxt='تاکنون دیدگاه جدیدی ثبت نشده';
                        topMenuNumTxt.text(newNumTxt);
                        targetCommentElem.find('.photo').remove();
                        targetCommentElem.find('.from').text('پنل مدیریت');
                        targetCommentElem.find('.time').text('همین حالا');
                        targetCommentElem.find('.message').text('دیدگاهی ثبت نشده برو یه چایی بخور خستگی در کن :)');
                        targetCommentElem.find('.message').addClass('comment-dontexist-panel');
                        
                    }
                    
                }
                else
                {
                    Swal.fire({
                        icon: 'error',
                        title: ' !!ارتباط با سرور دچار مشکل شده',
                        text: 'لطفا مجددا صفحه رفرش کنید',
                        confirmButtonText: 'باشه',
                    });
          
                    return false;
                }
                    
            }
        });
    });

});