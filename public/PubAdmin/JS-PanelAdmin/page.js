
function menu_list(){
    /*
  xmlHttp=new XMLHttpRequest();
  data=new FormData();
  data.append('value1',value);;
  xmlHttp.open('post');
xmlHttp.send(data);
*/
$.post("test.php",{name: "ali",lastname: "ghorbani"});

}
/*
$(document).ready(function(){
$("#menu_list").click(function(){
$.post("test.php",{name: "ali",lastname: "ghorbani"},



});
});
});*/



$(document).ready(function(){
    $("#menu_list").click(function(){
        //document.write("this isi dif iasfsd ");
        $.post("",{name: "ali",lastname: "ghorbani"});
         
         
     
    });
});
