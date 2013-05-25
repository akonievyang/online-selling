$(function(){
    SearchItem();
    SearchMember();
    viewSales();
    $("#closed").click(function(){

        $(".overlay").slideUp();

    });


    $("#display_add").click(function(){

        $(".overlay").slideDown();
    });

    $("#top_category").hover(function(){
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
        var inputfield=$("#form_item").serializeArray();
        var status=false;
        for(var ctr=0;ctr<inputfield.length;ctr++){

            if(inputfield[ctr].value==="" || inputfield[ctr].value=== NaN || inputfield[ctr].value===null || inputfield[ctr].value=== " "){
                status=true;
                break;
            }else{
                status=false;
            }

        }
        if(status){
            $(".warning").html("<h4>Some fields missing</h4>").fadeIn().fadeOut(5000).css({"color":"red"});
        }else{

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
                   $(".overlay").slideUp();

                },
                error:function(data){
                    alert(data);
                }
            });

        }
    });

    $("#save_changes").click(function(){

        var inputfield=$("#form_item").serializeArray();
        var status=false;
        for(var ctr=0;ctr<inputfield.length;ctr++){

            if(inputfield[ctr].value==="" || inputfield[ctr].value=== NaN || inputfield[ctr].value===null || inputfield[ctr].value=== " "){
                status=true;
                break;
            }else{
                status=false;
            }

        }
        if(status){
            $(".warning").html("<h5>Some fields missing</h5>").fadeIn().fadeOut(5000).css({"color":"red"});
        }else{

            var obj = {"id":$("#id").val(),
                "name":$("#name").val(),
                "brand":$("#brand").val(),
                "features":$("#features").val(),
                "price":$("#price").val(),
                "picture":$("#photoimg").val()
            };
            alert(obj.id)

            $.ajax({
                type:"POST",
                url:"save_item_changes.php",
                data:obj,
                success:function(data){
                    SearchItem();
                    $(".overlay").slideUp();
                    $("#preview").html("");

                },
                error:function(data){
                    alert(data);
                }
            });

        }
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

        $(".overlay").slideDown();
        $.ajax({
            type:"POST",
            url:"edit_item.php",
            data:{"id":id},
            success:function(data){


                var obj = JSON.parse(data);
                var filename=obj.filename;
                $('#id').val(obj.item_id);
                $('#name').val(obj.gadget_name);
                $('#brand').val(obj.brand);
                $('#features').val(obj.features);
                $('#price').val(obj.price);
                $('#preview').html(obj.image);


            },
            error:function(data){
                alert(data);
            }
        });

    }
    function viewSales(){

        $.ajax({
            type:"POST",
            url:"viewSales.php",
            data:{"search":$("#search_sales").val()},
            success:function(data){
                $("#tbod_sales").html(data);
            },error:function(data){F
                alert(data['statusText']+ " => " + data['status']);
            }

        });
    }
    function Number(){
        var status=/^[0-9]+$/;
        var price=$("#price").val();
        var pL = price.length;


        if(!status.test(price)){
            var p = price.substring(0,pL-1);
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


