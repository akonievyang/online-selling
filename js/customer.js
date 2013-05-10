$(function(){





});


    function CustomerViewItem(){
        $.ajax({
            type:"POST",
            url:"customerViewItem.php",
            data:{"search":$("#search").val()},
            success:function(data){

            },
            error:function(data){
                alert(data);

            }

        });
    }

    function Buy(id){


    }






