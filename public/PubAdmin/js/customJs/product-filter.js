$(document).ready(function(){

    function resetProperiesNames(){
        var newName=0;
        var filterName='';
     $('select.filter-change').each(function(){
         filterName='filter[' + newName.toString() +']';
         $(this).attr('name', filterName);
         newName++;
     });
    }

    function resetValueNames(){
        var newName=0;
        var valueName='';
        $('.select-value').each(function(){
            var inputBox=$(this).find('input[type=text]');
            var checkBox=$(this).find('input[type=radio]');
            valueName='value[' + newName.toString() +']';

            if(inputBox.length != 0){
                inputBox.attr('name', valueName);
                newName++;
            }else if(checkBox.length == 2){
                inputBox.attr('name', valueName);
                newName++;
            }
            
        });
    }

     //Show Select Panel (Filter Show When Change Propertis)
     $('.filter-change').change(function() {
        var type = $(this).children('option:selected').attr('data-type');
        var inputType = $(this).parent().siblings('div').children('input').length;
        var name=  $(this).children('option:selected').parent().attr('name');
        var array=name.split('filter');
        var index=array[1];
        if(type == 0 && inputType != true)
        {
            var valueProperty='<span>مقدار</span><input type="text"  name="value'+ index +'"  class="form-control filter-custom" id="exampleInputEmail1" placeholder="مقدار این ویژگی را وارد کنید ..." >';
            $(this).parent().siblings(".form-group").hide().fadeIn().css({'display': 'inline', 'margin-left': '0'}).html(valueProperty);
        }
        else if(type == 1)
        {
            var selectProperty ='<span>مقدار</span><div class="filter-custom sp-div-check"><div class="pretty p-icon p-curve p-pulse"><input type="radio" name="value' + index + '" value="0"><div class="state p-info-o" style="display:inline !important;"><label style="margin-left:15px !important"> دارد</label><i class="icon mdi mdi-check"></i></div></div><div class="pretty p-icon p-curve p-pulse"><input type="radio" name="value' + index + '" value="1"><div class="state p-info-o" style="display:inline !important;"><label style="margin-left:15px !important">ندارد</label><i class="icon mdi mdi-check"></i></div></div></div>';
            $(this).parent().siblings(".form-group").hide().fadeIn().css({'display': 'inline', 'margin-left': '7.5%'}).html(selectProperty);
        }
        resetProperiesNames();
        resetValueNames();
    });

      //Add Filter (From show Panel)
      $("#filter-add").click(function(){
        var count=$("#filter_holders .single-filter-append").length + 1;
        var countOfBox=$(".single-filter-append:first option").length;

        if( count <= countOfBox){
            $('#submit').text("اعمال ویژگی ها");
            var nameProperty='filter[' + (count-1).toString() + ']';
            var nameValue='value[' + (count-1).toString() + ']';
            var firstType=$('span[name$="type-first-filter"]').attr('data-value');
            var mainPart=$(".single-filter-append:first").clone(true);
            mainPart.children('.select-property').children('select').attr('name', nameProperty);
            mainPart.children('.select-value').children('input').val('');
            if(firstType == 0)
                mainPart.children('.select-value').children('input').attr('name', nameValue);
            else
                mainPart.children('.select-value').html('<div class="select-value"><span>مقدار</span><div class="filter-custom sp-div-check"><div class="pretty p-icon p-curve p-pulse"><input type="radio" name="'+nameValue+'" value="0"><div class="state p-info-o" style="display:inline !important;"><label style="margin-left:15px !important"> دارد</label><i class="icon mdi mdi-check"></i></div></div><div class="pretty p-icon p-curve p-pulse"><input type="radio" name="'+nameValue+'" value="1"><div class="state p-info-o" style="display:inline !important;"><label style="margin-left:15px !important">ندارد</label><i class="icon mdi mdi-check"></i></div></div></div></div>');

            //$("#filter_holders").append('<div class="panel-heading"></div>');   
            $("#filter_holders").append(mainPart);   
            resetProperiesNames();
            resetValueNames();
    }else{
        Swal.fire({
            icon: 'warning',
            title: 'داداچ داری اشتب میزنی 😅😅',
            text: 'تعداد جعبه در خواستی شما بیشتر از مشخصه های این محصول است',
            confirmButtonText: 'عه 😐',
        });
    }
        
        
    });

    $('.close-single-property').on('mouseenter', function(){
        var mainElement=$(this).parents('.single-filter-append');
        mainElement.addClass('del-hover-filter');
    });

    $('.close-single-property').on('mouseleave', function(){
        var mainElement=$(this).parents('.single-filter-append');
        mainElement.removeClass('del-hover-filter');
    });

    $('.close-single-property').on('click', function(){
        var count=$("#filter_holders .single-filter-append").length - 1;
        var countOfBox=$(".single-filter-append:first option").length;

        if(count == 0){
            Swal.fire({
                icon: 'question',
                title: 'داداش دیگه چیو میخوای حذف کنی؟',
                text: 'باید یک فیلد حداقل وجود داشته باشه :|',
                confirmButtonText: 'باشه بابا',
            });
            return false;
        }
        else
        {
            var mainElement=$(this).parents('.single-filter-append');
            mainElement.animate({'opacity' : 0},200);
            mainElement.slideUp(300);
           
            setTimeout(function(){
                mainElement.remove();
                resetProperiesNames();
                resetValueNames();
            }, 500);
            
            
        }


    });

    

});