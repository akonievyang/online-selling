$(function(){
    CustomerPic();
    CustomerViewItem();
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



    $("#li_setting_info").click(function(){
       retrieve_info_member();
    });

    $("#choice_add_to_cart").click(function(){

        var gadgets=$("#choice_unit").html()+"<br/>"+$("#choice_brand").html();;
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

    $("#check_out").click(function(){

        alert("blah");
        $.ajax({
            type:"POST",
            url:"add_to_sales.php",
            data:{"address":$("#address").val()},
            success:function(data){
                $("#successful").html( "Thank you! You successfully ordered the item!. ").fadeIn(2000);
                $(".overlay").hide();
            },error:function(data){
                alert(data['statusText']+ " => " + data['status']);
            }

        });



    })
    $("#clear_list").click(function(){

        $.ajax({
            type:"POST",
            url:"clear_cart.php",
            success:function(data){
                viewCart();
            },error:function(data){
                alert(data['statusText']+ " => " + data['status']);
            }

        });
    })
    $(".closed").click(function(){

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

function viewCart(){
    $.ajax({
        type:"POST",
        url:"viewCart.php",
        success:function(data){

            $(".overlay").show();
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
                console.log(data);

                //   $(".overlay").show();
                //     $("#tbod_cart").html(data);


            },
            error:function(data){
                alert(data['statusText']+ " => " + data['status']);

            }

        });

    }

}






