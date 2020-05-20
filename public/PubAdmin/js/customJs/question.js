$(document).ready(function(){
    $('select[name=subset]').change(function(){
        var subset=$('select[name=subset] option:selected').val();

        if(subset == '0'){
            $('#shareBox').slideUp();
            $('#answer-question').slideUp();
            $('#question-text').hide().text('عنوان دسته بندی').fadeIn('slow');
            $('#question-text').siblings('input').hide().prop('placeholder', 'عنوان دسته بندی سوال را وارد کنید...').fadeIn('slow');
            $('button[name=submit]').hide().text('افزودن دسته بندی').fadeIn('slow');
        }else{
            $('#shareBox').slideDown();
            $('#answer-question').slideDown();
            $('#question-text').hide().text('متن سوال').fadeIn('slow');
            $('#question-text').siblings('input').hide().prop('placeholder', 'عنوان سوال را وارد کنید ...').fadeIn('slow');
            $('button[name=submit]').hide().text('افزودن سوال').fadeIn('slow');
        }

    });
});