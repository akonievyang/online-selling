$(function(){



    CustomerViewItem();

    $("#register").click(function(){

        var entry = {
            "firstname":$("input[name = 'firstname']").val(),
            "middlename":$("input[name = 'middlename']").val(),
            "lastname": $("input[name ='lastname']").val(),
            "age": $("input[name = 'age']").val(),
            "address": $("input[name = 'address']").val(),
            "gender": $("#gender").val(),
            "contact": $("input[name = 'contactNum']").val(),
            "username": $("input[name = 'users']").val(),
            "password": $("input[name = 'pass']").val()
        };


        $.ajax({
            type: "POST",
            url: "Register.php",
            data: entry,
            success:function(data){
                alert("You're Already Registered "+entry.firstname+".");
                $('#register').append(data);

            },
            error: function(data){

                alert("Error="+data);
            }
        });
    });

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






