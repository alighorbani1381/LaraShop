

$(document).ready(function () {


  //Close Button Code 
  // $('.single-filter-part .close').on('mouseenter','button',function(){
  //     //$(this).parent().addClass('delete-hover');
  //     //console.log($(this).attr('type').toString());
  //     alert('check');
  //   });

  //   $('.close-single-filter').mouseleave(function(){
  //     $(this).parent('.single-filter-part').css('transition', '0.3s');
  //     $(this).parent('.single-filter-part').removeClass('delete-hover');
  //   });


  //Create New Filter Box Code
  let sub_button = document.querySelector('#submit');


  //Submit Button Press
  sub_button.addEventListener('click', function () {
      resetNamefromForm();
      var parentSelcted = $("#parent_id option:selected").val();
      var countOfBox = $(".single-filter-part").length;
      if (countOfBox < 1) {
        Swal.fire({
            icon: 'error',
            title: 'ای لجباز!',
            text: 'حالا که اینو پاک کردی منم صفحه رو رفرش می کنم تا درودی دیگر بدرود 😝',
            confirmButtonText: 'باشه',
        });
        setTimeout(function(){},8000);
        location.replace('/admin/filter/create');
      }

      var result = true;
      if (parentSelcted < 0) {
        Swal.fire({
          icon: 'warning',
          title: 'هشدار',
          text: 'اول یه دسته بندی رو انتخاب کن',
          confirmButtonText: 'حله',
      });
      }
       else
      {

        var errorIcon='<i class="livicon"  data-name="ban" data-onparent="true" data-size="18" data-color="red" id="livicon-8" style="width: 18px; height: 18px;"><svg height="18" version="1.1" width="18" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.516663px; top: -0.899994px;" id="canvas-for-livicon-8"><desc>Created with Raphaël 2.1.0</desc><defs></defs><path style="" fill="#ff0000" stroke="none" d="M25.899,6.101C20.431,0.633,11.568000000000001,0.633,6.100000000000001,6.101S0.6320000000000014,20.432,6.100000000000001,25.9S20.431,31.368,25.899,25.9S31.367,11.568,25.899,6.101ZM8.222,23.778C7.739,23.294999999999998,7.308999999999999,22.776999999999997,6.933999999999999,22.232999999999997C3.979,17.948,4.409,12.035,8.222,8.222C12.035,4.408999999999999,17.944,3.9879999999999995,22.229999999999997,6.943L6.934,22.233C7.99,23.678,8.498000000000001,24.186,9.767,25.066000000000003L25.058,9.771C28.012,14.057,27.591,19.966,23.779,23.779C19.966,27.592,14.052,28.021,9.767,25.067C9.223,24.691,8.706,24.262,8.222,23.778Z" stroke-width="0" transform="matrix(0.5625,0,0,0.5625,0,0)"></path></svg></i>';
          $('.single-filter-part').find('input').each(function () {
              if ($.trim($(this).val()).length == 0) 
              {
                  var typeOfInput=$(this).attr('type');
                  if(typeOfInput == 'text')
                  {
                    $(this).siblings('i').remove();
                    $(this).addClass('alert-fill');
                    $(this).parents('.filter-type').children('span').after(errorIcon).fadeIn(500);
                  }
                  result = false;
              } 
              else
               {
                  $(this).siblings('i').remove();
                  $(this).removeClass('alert-fill');
              }
          });

          var checkedNumber = 0;
          var countOfCheckBox = 0;
          var statusChecked = true;
          $(".filter-type").find('input[type=radio]').each(function () {
              countOfCheckBox++;
              $(this).parents('.filter-type').children('i').remove();
              var selectCheckBox = $(this).prop('checked');
              if (selectCheckBox == true)
                  checkedNumber++

          });
          countOfCheckBox = countOfCheckBox / 2;

          if (checkedNumber < countOfCheckBox) {
              statusChecked = false;
              
              $(this).parents('.filter-custom').addClass('alert-fill');
              $(this).parents('.filter-custom').siblings('span').after(errorIcon).fadeIn(500);
          }
          resetNamefromForm();
          if (result == true && statusChecked == true)
              $('#submit').attr('type', 'submit'); //Submit Form
          else {

              Swal.fire({
                  icon: 'error',
                  title: 'هشدار',
                  text: 'اول باید همه فیلد ها رو پر کنی',
                  confirmButtonText: 'باشه',
              });

          }

      }

  });


  let add_filter = document.querySelector('#add-filter');
  //Add Filter Button Press
  add_filter.addEventListener('click', function () {

      if (new_number > 1) {
          sub_button.innerHTML = "ثبت فیلتر ها";
      }

      var parentSelcted = $("#parent_id option:selected").val();
      var new_number = $('.single-filter-part').length;
      if (parentSelcted == -1) {
          $("#parent_id option").each(function () {
              $(this).removeProp('selected');
              if ($(this).val() == 0)
                  $(this).prop('selected', true);
          });

      }

      var mainPart = $(".single-filter-part:first").clone(true);
      resetNewClone(mainPart);
      $("#filter_holders").append(mainPart).hide().fadeToggle(300);
      resetNamefromForm();
  });

  function resetNewClone(mainPart){
    mainPart.find('input').removeClass('alert-fill');
    mainPart.find('i.livicon').remove();
    mainPart.find('input[name^=persian_name]').val('');
    mainPart.find('input[name^=english_name]').val('');
  }

  function resetNamefromForm() {
      var countCheckbox = 0;
      $('.single-filter-part .form-group').each(function () {
          var hasCheckBox = $(this).find('input[type=radio]').length;
          countCheckbox += hasCheckBox;
      });

      if (countCheckbox != 0) //Page Has a CheckBoxes
      {
          rewriteFormWithCheckbox();
      } else {
          rewriteFormWithoutCheckbox();
      }

  }

  function rewriteFormWithCheckbox() {
      var resetName = 0;
      $('.single-filter-part .form-group').each(function () {
          var persian_name = $(this).children('.filter-custom[name^=persian]').length;
          var english_name = $(this).children('.filter-custom[name^=english]').length;
          var type = $(this).find('input[type=radio]').length;

          if (persian_name != 0)
              $(this).children('.filter-custom[name^=persian]').attr('name', 'persian_name[' + resetName + ']');

          if (english_name != 0)
              $(this).children('.filter-custom[name^=english]').attr('name', 'english_name[' + resetName + ']');

          if (type == 2) {
              $(this).find('input[type=radio]').attr('name', 'type[' + resetName + ']'),
                  resetName++;
          }

      });

  }

  function rewriteFormWithoutCheckbox() {
      var resetName = 0;
      $('.single-filter-part .form-group').each(function () {
          var persian_name = $(this).children('.filter-custom[name^=persian]').length;
          var english_name = $(this).children('.filter-custom[name^=english]').length;
          if (persian_name != 0)
              $(this).children('.filter-custom[name^=persian]').attr('name', 'persian_name[' + resetName + ']');

          if (english_name != 0) {
              $(this).children('.filter-custom[name^=english]').attr('name', 'english_name[' + resetName + ']');
              resetName++;
          }

      });

  }

  //Close Box Click
  $('.close-single-filter').on('click', function () {
      var countOfBox = $(".single-filter-part").length - 1;

      if (countOfBox < 1) {

          Swal.fire({
              icon: 'question',
              title: 'داداش دیگه چیو میخوای حذف کنی؟',
              text: 'باید یک فیلد حداقل وجود داشته باشه :|',
              confirmButtonText: 'باشه',
          });

          return false;
      }


      var mainElement = $(this).parents('.single-filter-part');
      mainElement.animate({
          'opacity': '0'
      }, 200);
      
      mainElement.slideUp(300);

      setTimeout(function () {
        resetNamefromForm();
          mainElement.remove();
      }, 550);


      resetNamefromForm();
  });

  //Setup Ajax (CSRF Token Laravel)
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });


  //Given Data From Category Id
  $("#category_id").change(function () {
      $("#parent_id").css('width', '92%');
      $(".loading").fadeIn();
      var categoryId = $(this).val();
      changeFilterValue(categoryId);
      $(".filter-type").each(function () {
          $(this).remove();
      });
      $('.english-name').css('margin-right', '25%');
  });

  var chagedFilterBox = true;

  //Change to Subset Actions
  $('#parent_id').on('change', function () {
      var numOfFilterBox = $('.filter-type').length;
      var filterId = $(this).val();

      if (filterId > 0)
          chagedFilterBox = true;

      if (filterId == 0) {
          $(".filter-type").remove();
          $('.english-name').css('margin-right', '25%');
      } else if (filterId == -1) {
          $("#parent_id option").removeProp('selected').filter('[value=0]').prop('selected', true);
          chagedFilterBox = false;
      } else {
          if (chagedFilterBox == true) {
              $('.filter-type').remove();
              $('.english-name').css('margin-right', '0px');
              rewriteCheckBox();
          }
      }

  });


  //Send Category id with Ajax and Recive this properties
  function changeFilterValue(categoryId) {
      $.ajax({
          url: '/admin/givefilter/category',
          type: 'get',
          dataType: 'json',
          data: {
              cat_id: categoryId
          },
          success: function (data) {
              if (data.hasFilter == "Yes") {
                  $("#parent_id").html('<option value="0" selected >سرگروه</option>');
                  for (var i = 0; i < data.filters.length; i++)
                      $("#parent_id").append('<option value=" ' + data.filters[i].id + '" >' + data.filters[i].persian_name + '</option>');
              } else {
                  $("#parent_id").html('');
                  $("#parent_id").append('<option value="0" selected >سرگروه</option>');
              }
              $(".loading").fadeOut();
              $("#parent_id").css('width', '100%');

          }
      });
  }

  //Rewrite All CheckBoxes
  function rewriteCheckBox() {
      var new_number = 0;
      $('.single-filter-part').each(function () {
          var typeFilter_template = '<div class="form-group filter-type" style="display:none;"><span>نوع فیلتر</span><div class="filter-custom sp-div-check"><div class="pretty p-icon p-curve p-pulse"><input type="radio" name="type[' + new_number + ']" value="0"><div class="state p-info-o" style="display:inline !important;"><label style="margin-left:15px !important"> توضیحی</label><i class="icon mdi mdi-check"></i></div></div><div class="pretty p-icon p-curve p-pulse"><input type="radio" name="type[' + new_number + ']" value="1" ><div class="state p-info-o" style="display:inline !important;"><label style="margin-left:15px !important"> انتخاب گر</label><i class="icon mdi mdi-check"></i></div></div></div></div>';
          $(this).children('.panel-heading').last().before(typeFilter_template);
          $(this).children('.filter-type').delay(250).fadeIn();
          new_number++;
      });

  }


});

