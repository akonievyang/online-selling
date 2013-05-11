$(function(){


    CustomerViewItem();


});


    function CustomerViewItem(){
        $.ajax({
            type:"POST",
            url:"customerViewItem.php",
            data:{"search":$("#search").val()},
            success:function(data){
                $(".product").html(data);
            },
            error:function(data){
                alert(data);

            }

        });
    }

    function BuyNow(id,name,brand,price,features){

        $("#itemp").html(price);
        $("#itemF").html(features);
        $("#itemN").html(name);
        $("#itemB").html(brand);

        $("#buyclick").click(function(){
            var obj={
                "name":$("#itemN").html(),
                "brand":$("#itemB").html(),
                "price":$("#itemp").html()
            };
            alert(obj.name);

           /* $("#cart").append("<tr>"+
                "<td>"+obj.name+"</td>"+
                "<td><input type='text' id='pcs' /></td>"+
                "<td>"+obj.price+"</td>"+
                "<td><input type='text' readonly='readonly' id='total'/></td>"+
                "</tr>");
            $("#pcs").keyup(function(){
                var quantity=($("#pcs").val());
                var total=obj.price*quantity;
                $("#total").val(total);

                var tr=$("#tb_cart").serializeArray();


            });*/
             $.ajax({
             type:"POST",
             url:"addToCart.php",
             data:{"search":$("#search").val()},
             success:function(data){
             $(".shopping_cart").show();
             },
             error:function(data){
             alert(data);

             }

             });

        });

    }






