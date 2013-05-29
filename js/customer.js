
$(function(){

    display_limit_item();
    display_pager();
    CustomerPic();

    $('#photoimg').live('change', function(){
        $("#preview").html('');
        $("#preview").html('<img src="images/loader.gif" alt="Uploading...."/>');
        $("#imageform").ajaxForm({
            target: '#preview'

        }).submit();
    });

    $("#register_form").submit(function(){

        var entry = {
            "firstname":$("input[name = 'firstname']").val(),
            "middlename":$("input[name = 'middlename']").val(),
            "lastname": $("input[name ='lastname']").val(),
            "age": $("input[name = 'age']").val(),
            "address": $("input[name = 'address']").val(),
            "gender": $("#gender").val(),
            "contact": $("input[name = 'contactNum']").val(),
            "user": $("input[name = 'user']").val(),
            "pass": $("input[name = 'pass']").val()
        };

        $.ajax({
            type: "POST",
            url: "register.php",
            data: entry,
            success:function(data){
               alert("You're Already Registered "+entry.firstname+".");
            },
            error: function(data){

                alert("Error="+data);
            }
        });
        return false;
    });
    $("#save_profile").click(function(){
        $("#imageform").hide();
    });



    $("#shop_more").click(function(){
        $(".content").show();
        $(".overlay").hide();

    });

    $(".nav-container").on('click','ul li ul li')

    $("#li_setting_info").click(function(){
       retrieve_info_member();
    });

    $("#choice_add_to_cart").click(function(){
        $(".overlay").show();

        var gadgets=$("#choice_unit").html()+"<br/>"+$("#choice_brand").html();
        var price=$("#choice_price").html();
        $("#choice_features").html();
        $("#choice_picture").html();
        var id=$("#id").html();


        $.ajax({
            type:"POST",
            url:"addToCart.php",
            data:{"id":id},
            success:function(data){

                viewCart();
            },
            error:function(data){
                alert(data);
            }

        });

    });

    $("#form_checkOut").submit(function(){
       var obj= {"address":$("#address").val()};

        $.ajax({
            type:"POST",
            url:"add_to_sales.php",
            data:{"address":$("#address").val()},
            success:function(data){
                console.log(data);
                $("#successful").html( "Thank you! You successfully ordered the item!. ").fadeIn(2000);
                $(".overlay").hide();

            },error:function(data){
                alert(data['statusText']+ " => " + data['status']);
            }

        });

        return false;

    })
    $("#clear_list").click(function(){

        clear_cart();
    })
    $(".closed").click(function(){

        $(".overlay").hide();
    });

    $(".customer_pager").on('click','li a',function(){

        var li_index =$(($(this).context.parentNode)).index();

        var next=($(".customer_pager ul li").length)-1;
        var selected_page=$(this).html();
        var current_page=parseInt($("#current_page").val());
        alert(current_page)

        if(li_index==0){
            if(current_page != 0){
              console.log( $("#current_page").val(current_page-1));

            }
        }else if(li_index==next){

            $("#current_page").val(current_page+1);

        }else{

            $("#current_page").val(selected_page-1);

        }

        display_limit_item();
    });

    $(".customer_pager ").on('click','ul li',function(){

        $(".customer_pager li").removeClass('active');
      //  alert($(this).index());

            $(this).addClass('active');

    });
    $(".search_item").keyup(function(){
        searchItem();

    })


});

    function edit_profile(){
       $("#imageform").show();
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

    function displayChoiceInfo(id){

        $(".choice_view").show();
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


    function viewCart(){
        $.ajax({
            type:"POST",
            url:"viewCart.php",
            success:function(data){
                $("#tbod_cart").html(data);
            },
            error:function(data){
                alert(data['statusText']+ " => " + data['status']);

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

    function get_cost_by_quantity(id,price){

        var total=0;
        var sum=0;
        var tbod=document.getElementById('tbod_cart');
        var tr=tbod.getElementsByTagName('tr');

        for ( var i= 0; i<tr.length; i++){
            var td=tr[i].getElementsByTagName('td')[1];
            var qty=td.getElementsByTagName('input')[0].value;
            var td1=tr[i].getElementsByTagName('td')[3];
            var total_price=td1.getElementsByTagName('input')[0];
            var total=eval(qty*price);
            total_price.value=total;
            sum+=total;

            $("#total_all_item").val(sum);

            $.ajax({
                type:"POST",
                url:"update_item_choice_quantity.php",
                data:{"quantity":qty,"id":tr[i].id},
                success:function(data){
                    $("#successful").html(data);
                    $(".overlay").show();

                },
                error:function(data){
                    alert(data['statusText']+ " => " + data['status']);

                }
            });

        }

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

    function displayChoiceInfo(id){

        $(".choice_view").show();
        $(".post").fadeOut();
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
               $("#choice_status").html(obj.stock_status);

                if(obj.stock_quantity==0 || obj.stock_quantity==null){
                    $("#choice_add_to_cart").attr('disabled','disable');
                }else{
                    $("#choice_add_to_cart").removeAttr('disabled');
                }
            },
            error:function(data){
                alert(data);

            }
        });


    }


    function clear_cart(){
        $.ajax({
            type:"POST",
            url:"clear_cart.php",
            success:function(data){
                viewCart();
            },error:function(data){
                alert(data['statusText']+ " => " + data['status']);
            }

        });
    }

    function searchItem(){
    var data={"search":$(".search_tem").val()};
    var search_data= ajax_request("search_gadgets.php",data,"catch_data");
        search_data.success(function(data){
            $(".product").html(data);

        })
    }

   function display_limit_item(){
        var current_page=$("#current_page").val();
        var per_page=4;
        var data={"current_page":current_page*per_page};
        var view_data=ajax_request("paginate_item.php",data,"catch_data");
            view_data.success(function(data){
                console.log(JSON.stringify(data));
                $(".product").html(data);
            });
    }
   function display_pager(){

        var per_page=4;
        var data={"per_page":per_page};
        var pager=ajax_request("item_pager_customer_side.php",data,"catch_data");
            pager.success(function(data){
            $(".customer_pager").html(data);

        });
    }
    function ajax_request(url,data,catch_data){
        return $.ajax({
            type: "POST",
            url: url,
            data: data,
            error: function(data) {
                console.log("Error in "+data +" = " + JSON.stringify(data));
            }
        });
    }


