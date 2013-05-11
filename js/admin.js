/**
 * Created with JetBrains PhpStorm.
 * User: student1
 * Date: 5/6/13
 * Time: 9:21 AM
 * To change this template use File | Settings | File Templates.
 */

$(function(){

    SearchItem();
    SearchMember();
    $("div.pickcolor").click(function(){
     var id=document.getElementById(this.id);
        $().sho()

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
            $(".errorwarning").html("Some fields not yet filled up").fadeIn().fadeOut(5000).css({"color":"red"});
        }else{


            var obj = {"name":$("#name").val(),
                "brand":$("#brand").val(),
                "features":$("#features").val(),
                "price":$("#price").val(),
                "picture":$("#photoimg").val()
            };
            if(obj.picture==null||obj.picture==""||obj.picture==NaN||obj.picture==" "){
                $(".errorwarning").html("Upload picture").fadeIn().fadeOut(5000).css({"color":"red"});
            }else{

            }

            $.ajax({
                type:"POST",
                url:"add_item.php",
                data:obj,
                success:function(data){
                    $(".upload_container").hide();
                    SearchItem();
                },
                error:function(data){
                    alert(data);
                }
            });

        }
    });

   $("#add").click(function(){
        $(".upload_container").show();
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
        var status=/^[0-9]$/;
        var price=$("#price").val();
        var pL = price.length;


        if(!status.test(price)){
            var p = price.substring(0,pL-1);
            $("#price").val(p);

        }
        if(status.test(price)){
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
function addMember(){
          $.ajax({
            type: "POST",
            url: "addMember.php",

            data: {
                "firstname":$("input[name = 'firstname']").val(),
                "middlename":$("input[name = 'middlename']").val(),
                "lastname": $("input[name ='lastname']").val(),
                "address": $("input[name = 'address']").val(),
                "age": $("input[name = 'age']").val(),
                "gender": $("#gender").val(),
                "contactNum": $("input[name = 'contactNum']").val(),
                "username": $("input[name = 'username']").val(),
                "password": $("input[name = 'password']").val()

            },


            success:function(data){


                $('#user').append(data);

            },
        error: function(data){
            /*alert("Error="+data);*/
            alert("sahgbglsdg")

            }
        });

}

