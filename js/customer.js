$(function(){
    $("#shop_more").click(function(){
        $(".content").show();
        $(".overlay").hide();

    });
    $("#top_category").mouseover(function(){
        $("#top_category").css({"background-color" : "#ffffff"});
        $("#top_profile").css({"background-color" : "transparent"});
        $(".navigation").slideDown(1000);
        $(".profile").hide();
        $(".category").show();



    });
    $("#top_profile").mouseover(function(){
        $("#top_profile").css({"background-color" : "#ffffff"});
        $("#top_category").css({"background-color" : "transparent"});

        $(".navigation").slideDown(1000);
        $(".category").hide();
        $(".profile").show();


    });
    $("#buyclick").click(function(){
        $("shopping_cart").show();
       alert( $("#add_to_cart").attr(id));
       /* $.ajax({
            type:"POST",
            url:"addToCart.php",
            data:{"id":id},
            success:function(data){
                $(".overlay").show();

                $("#cart").append(data);
            },
            error:function(data){
                alert(data);

            }

        });*/
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

    function LogIn_Admin(){
        $("#logAdmin").hide();
         $("#login_admin").click(function(){
             $("#logAdmin").dialog({
                 autoOpen: true,
                 show: "explode",
                 hide: "explode",
                 modal: "true",
                 buttons: {
                     "close": function(){
                         $("#logAdmin").dialog("close");
                     }
                 }
             });
         });

    }


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
       var pic= $("#item_picture").html("<img src="+pic+" />");
       var pice=$("#itemp").html(price);
        $("#itemF").html(features);
       var name=$("#itemN").html(fname+" "+lname);
       var brand=$("#itemB").html(brand);
    }
    function Quantity(price,id){

            var total= $("#quantity").val()*price;
            $("#totalprice").val(total);
            $("#total").val(total);

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



