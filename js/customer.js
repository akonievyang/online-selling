$(function(){
    CustomerPic();

    $('#photoimg').live('change', function(){
        $("#preview").html('');
        $("#preview").html('<img src="images/loader.gif" alt="Uploading...."/>');
        $("#imageform").ajaxForm({
            target: '#preview'

        }).submit();

    });

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


    CustomerViewItem();

    $("#choice_add_to_cart").click(function(){
        $(".overlay").show();

        var gadgets=$("#choice_unit").html()+"<br/>"+$("#choice_brand").html();;
        var price=$("#choice_price").html();
        $("#choice_features").html();
        $("#choice_picture").html();
        var id=$("#id").html();

        $("#cart").append("<tr>" +
            "<td>"+gadgets+"</td>"+
            "<td>"+"<input type='text' id='choice_quantity' onkeyup=get_totalprice'(+id+)' />"+"</td>"+
            "<td>"+price+"</td>"+
            "<td>"+"<input type='text' readonly='readonly'/>"+"</td>"+
            "<td>"+"<images src='images/remove.png'/>"+"</td>"+
            "</tr>");


        $.ajax({
            type:"POST",
            url:"addToCart.php",
            data:{"id":id,"quantity":$("#choice_quantity").val()},
            success:function(data){
                console.log(data);
                $("#cart").append(data);
                $(".overlay").show();

            },
            error:function(data){
                alert(data);
            }

        });

    });
    $("#li_setting_info").click(function(){
       retrieve_info_member();
    });

    $(".closed").click(function(){
        alert("pass")
        $(".overlay").hide();
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

    function displayChoiceInfo(id){


        $.ajax({
            type:"POST",
            url:"viewDisplay.php",
            data:{"id":id},
            success:function(data){
               var obj=JSON.parse(data);
               $("#choice_unit").html(obj.item_unit);
               $("#choice_brand").html(obj.item_brand);
               $("#choice_price").html(obj.item_price);
               $("#choice_features").html(obj.item_features);
               $("#choice_picture").html(obj.item_pic);
               $("#id").html(obj.item_id);
            },
            error:function(data){
                alert(data);

            }

        });


    }
    function Quantity(price,id){

            var total= $("#quantity").val()*price;
            $("#totalprice").val(total+id);
            $("#total").val(total);

    }


    function viewCart(){
        $.ajax({
            type:"POST",
            url:"viewCart.php",
            success:function(data){
                $("#cart").append(data);
            },
            error:function(data){
                alert(data);

            }

        });
    }
    function removeFromCArt(id){

        $.ajax({
            type:"POST",
            url:"removeFromCart.php",
            data:{"id":id},
            success:function(data){
                viewCart();
            },
            error:function(data){
                alert(data);

            }

        });
    }

    function retrieve_info_member(){
        $.ajax({

            type: "POST",
            url: "edit_member.php",
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

    function CustomerPic(){

        $.ajax({
           type:"POST",
           url:"customerPic.php",
           success:function(data){
                $("#preview").html(data);
           },
           error:function(){
               alert(data);
           }

        });

    }



