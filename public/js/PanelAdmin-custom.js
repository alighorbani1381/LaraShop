$(document).ready(function(){


/* Create a Beautiful animated submit button*/
function setAmimateSubmit(textName, formId=null){
    let button = document.querySelector('.button-animate-send');
    let buttonText = document.querySelector('.tick');
    const tickMark = "<svg width=\"15\" height=\"32\" viewBox=\"0 0 58 45\" xmlns=\"http://www.w3.org/2000/svg\"><path fill=\"#fff\" fill-rule=\"nonzero\" d=\"M19.11 44.64L.27 25.81l5.66-5.66 13.18 13.18L52.07.38l5.65 5.65\"/></svg>";
    buttonText.innerHTML = textName;
    button.addEventListener('click', function() {

      if (buttonText.innerHTML !== textName) 
        buttonText.innerHTML = textName;

      else if (buttonText.innerHTML === textName) 
        buttonText.innerHTML = tickMark;
      
      this.classList.toggle('button-animate-send__circle');
      if(formId != null)
      {
        var targetForm = '#' + formId;
        $(targetForm).submit(function(){}); 
      }
      else
         $("form").submit(function(){}); 
        

    });
}

});