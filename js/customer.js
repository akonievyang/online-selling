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

    $("#addToCart").click(function(){

        $(".overlay").show();
        var id=$("#dbh_itemID").val();
        //$("#item_picture").html("<img src="+pic+" />");
        var price=$("#itemp").html();

        var name=$("#itemN").html();
        var brand=$("#itemB").html();

      $("#cart").append("<tr>" +
                          "<td>"+name+"</td>"+
                          "<td>"+"<input type='text' id='choice_pcs'  />"+"</td>"+
                          "<td>"+price+"</td>"+
                          "<td>"+"<input type='text' readonly='readonly'/>"+"</td>"+
                          "</tr>");


        $.ajax({
            type:"POST",
            url:"addToCart.php",
            data:{"id":id},
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

    function displayChoiceInfo(id){

        $(".content").load("pages/item_choice_mainView.php");
        $.ajax({
            type:"POST",
            url:"viewCart.php",
            data:{"id":id},
            success:function(data){
                $("#cart").append(data);
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

    //editing customer
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



