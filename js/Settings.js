$(document).ready(function(){

   $("#saveto").click(function(){
        alert('alert');
        alert(JSON.stringify($("#Register_From").serializeArray()));
       $.ajax({

           type: "POST",
           url: "saveto.php",
           data: {data: JSON.stringify($("#Register_Form").serializeArray())},
           success: function(data){

           },
           error: function(data){

           }

       });
   });


});