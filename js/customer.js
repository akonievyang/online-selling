$(function(){


    $("#reg").click(function(){
       var entry = {
           "firstname":$("input[name = 'firstname']").val(),
           "middlename":$("input[name = 'middlename']").val(),
           "lastname": $("input[name ='lastname']").val(),
           "age": $("input[name = 'age']").val(),
           "address": $("input[name = 'address']").val(),
           "gender": $("#gender").val(),
           "username": $("input[name = 'username']").val(),
           "password": $("input[name = 'password']").val(),
           "contact": $("input[name = 'contactNum']").val()
       }

       });
    CustomerViewItem();
    $(".closed").click(function(){
        alert("pass")
        $(".overlay").hide();
    });
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

    function buyNow(id,fname,lname,brand,price,pic,features){


        $(".secondcontent").show();
        $("#item_picture").html("<img src="+pic+" />");
        $("#itemp").html(price);
        $("#itemF").html(features);
        $("#itemN").html(fname+" "+lname);
        $("#itemB").html(brand);

       $("#buyclick").click(function(){
           $(".overlay").show();
           $("shopping_cart").show();
            var obj={
                "name":$("#itemN").html(),
                "brand":$("#itemB").html(),
                "price":$("#itemp").html()
                };


             $.ajax({
             type:"POST",
             url:"addToCart.php",
             data:{"search":$("#search").val()},
             success:function(data){
             //$(".shopping_cart").show();
                 $("#cart").append(data);
             },
             error:function(data){
             alert(data);

             }

             });
        });



    }
    function Quantity(price,id){
            alert(id)

            var total= $("#quantity").val()*price;
            $("#totalprice"+id).val(total);

    }

    //editing customer

    function edit_member(id){
        alert("test");
        var personObj = {"id":id};

        $.ajax({

            type: "POST",
            url: "edit_member.php",
            async:true,
            data: personObj,
            success:function(data){
                var Obj = JSON.parse(data);
                $("#id").val(obj.id);
                $("#firstname").val(obj.firstname);
                $("#middlename").val(obj.middlename);
                $("#lastname").val(obj.lastname);
                $("#age").val(obj.age);
                $("#address").val(obj.address);
                $("#gender").val(obj.gender);
                $("#username").val(obj.username);
                $("#password").val(obj.password);

              },
              error:function(data){
                  alert(data);
              }
        });


    }



