$(function(){

    SearchItem();
    SearchMember();
    $("div.pickcolor").click(function(){
     var id=document.getElementById(this.id);
        $().sho()

    });


    $("#top_category").mouseover(function(){
        $("#top_category").css({"background-color" : "#ffffff"});
        $(".navigation").slideDown(1000);
        $(".profile").hide();
        $(".category").show();



    });
    $("#top_profile").mouseover(function(){
        $("#top_profile").css({"background-color" : "#ffffff"});
        $(".navigation").slideDown(1000);
        $(".category").hide();
        $(".profile").show();


    });


   $("#li_item").click(function(){
        $(".view_item").show();
         $(".member").hide();
    });

    $("#li_customer").click(function(){

        $(".view_item").hide();
        $(".member").show();
    });
    $('#photoimg').live('change', function(){
        $("#preview").html('');
        $("#preview").html('<img src="images/loader.gif" alt="Uploading...."/>');
        $("#imageform").ajaxForm({
            target: '#preview'
        }).submit();

    });

    $("#saveitem").click(function(){
            var obj = {"name":$("#name").val(),
                "brand":$("#brand").val(),
                "features":$("#features").val(),
                "price":$("#price").val(),
                "picture":$("#photoimg").val()
            };


            $.ajax({
                type:"POST",
                url:"add_item.php",
                data:obj,
                success:function(data){

                    SearchItem();
                },
                error:function(data){
                    alert(data);
                }
            });


    });

   $("#btn_add").submit(function(){
        $(".upload_container").show();
       return false;
   });



   $("#items").on('click','tr',function(){
       var tbID=document.getElementById($(this).context.id);
       var checkbox=tbID.getElementsByTagName('td')[0].getElementsByTagName('input')[0];
       checkbox.checked ? checkbox.checked=false : checkbox.checked=true;
   });


    $("#delete_item").click(function(){

        DeleteItem();
    });
    $("#search").keyup(function(){
        SearchItem();
    });
    $("#searchM").keyup(function(){
        SearchMember();
    });

});


function DeleteItem(){

        var item_id=new Array();
        var tbod=document.getElementById("items");
        var tr=tbod.getElementsByTagName('tr');

        for( var i=0;i<tr.length;i++){
            var trID = document.getElementById(tr[i].id);
            var checkbox=trID.getElementsByTagName('td')[0].getElementsByTagName('input')[0];

            if(checkbox.checked){
                item_id.push(tr[i].id);
            }

        }
        $.ajax({

            type:"POST",
            url:"delete_item.php",
            data:{"id":item_id},
            success: function(data){
               SearchItem();
            },
            error: function(data){
                alert(data);
            }

    });

    }

    function Edit_item(id){
        $.ajax({
            type:"POST",
            url:"editVideo.php",
            data:{"id":id},
            success:function(data){
                var obj = JSON.parse(data);
                $('#id').val(obj.id);
                $('#title').val(obj.title);
                $('#genre').val(obj.genre);
                $('#quantity').val(obj.quantity);
                $('#price').val(obj.price);
            },
            error:function(data){
                alert(data);
            }
        });

    }
    function Number(){
        var status=/^[0-9]+$/;
        var price=$("#price").val();
        $('#price').priceFormat({
            clearPrefix: true
        });

        var pL = price.length;


        if(!status.test(price)){
            var p = price.substring(0,pL-1);
            $("#price").val(p);

        }
       else{
            var p = price.substring(0,4);
            $("#price").val(p);
        }
    }
    function ViewAllProducts(){
        $.ajax({
            type:"POST",
            url:"viewAll.php",
            success:function(data){

            },
            error:function(data){
                alert(data);
            }

        });
    }
    function SaveUploaded(id){
        $.ajax({
            type:"POST",
            url:"viewAddedPic.php",
            success:function(data){

            },
            error:function(data){
                alert(data);
            }

        });

    }
    function SearchItem(){

        $.ajax({
            type:"POST",
            url:"search_item.php",
            data:{"search":$("#search").val()},
            success:function(data){
                $("#items").html(data);
            },
            error:function(data){
                alert(data);
            }
        });
    }
    function pagination(){
        $.ajax({
            type:"POST",
            url:"item_pagination.php",
            data:{"search":$("#search").val()},
            success:function(data){


                $("#items").html(data);
            },
            error:function(data){
                alert(data);
            }
        });
    }
    function SearchMember(){
        $.ajax({
            type:"POST",
            url:"search_member.php",
            data:{"search":$("#searchM").val()},
            success:function(data){
                $("#member").html(data);
            },
            error:function(data){
                alert(data);
            }
        });

    }


