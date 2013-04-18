$(function(){
      $("#send").click(function(){
        
         $.ajax({
            type:"POST",
            url:"message.php",
            data:{"msg": $(".input-small").val()},
            success:function(data){
               console.log(data);             
               $(".you").append(data).outerHeight(true);
              
            },
            error:function(data){
               alert(data);
            
            }
         });
      });

});
