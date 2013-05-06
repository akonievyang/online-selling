/**
 * Created with JetBrains PhpStorm.
 * User: student1
 * Date: 5/6/13
 * Time: 9:21 AM
 * To change this template use File | Settings | File Templates.
 */

$(function(){
    ViewItem();
   $("#add_item").click(function(){
       var obj = {"name":$("#name").val(),
                  "brand":$("#brand").val(),
                  "desc":$("#desc").val(),
                  "features":$("#features").val(),
                  "price":$("#price").val()};

       $.ajax({
          type:"POST",
          url:"add_item.php",
          data:obj,
          success:function(data){
              ViewItem();
          },
          error:function(data){
              alert(data);
          }
       });

   });

   $("#items").on('click','tr',function(){
       var tbID=document.getElementById($(this).context.id);
       var checkbox=tbID.getElementsByTagName('td')[0].getElementsByTagName('input')[0];
       checkbox.checked ? checkbox.checked=false : checkbox.checked=true;
   });


    $("#delete_item").click(function(){

        DeleteItem();
    });

});

function ViewItem(){
    $.ajax({
       type:"POST",
       url:"viewItem.php",
       success:function(data){
           $("#items").html(data);
           console.log(data);
       },
       error:function(data){
           alert(data);
       }
    });

}
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
                ViewItem();
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