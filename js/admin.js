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
             $("#item").append(data);
              console.log(data);
          },
          error:function(data){
              alert(data);
          }
       });

   });

   $("#item").on('click','tr',function(){
       var tbID=document.getElementById($(this).context.id);
       var checkbox=tbID.getElementsByTagName('td')[0].getElementsByTagName('input')[0];
       checkbox.checked ? checkbox.checked=false : checkbox.checked=true;
   });




});

function ViewItem(){
    $.ajax({
       type:"POST",
       url:"viewItem.php",
       success:function(data){
           $("#item").html(data);
           console.log(data);
       },
       error:function(data){
           alert(data);
       }
    });

}
function DeleteItem(){
    function deleteVideos(){
        var deletevideo=new Array();
        var tbod=document.getElementById('v_tbod');
        var tr=tbod.getElementsByTagName('tr');

        for( var i=0;i<tr.length;i++){
            var trID = document.getElementById(tr[i].id);
            var checkbox=trID.getElementsByTagName('td')[0].getElementsByTagName('input')[0];

            if(checkbox.checked){
                deletevideo.push(tr[i].id);
            }
        }
        var check=$("input[name='checkVideo']:checkbox:checked").length>0;

            var deleteId={"id":deletevideo};
            $.ajax({

                type:"POST",
                url:"deleteVideo.php",
                data:deleteId,
                success: function(data){
                    console.log(data);
                    for (var ctr=0; ctr<deletevideo.length; ctr++){
                        $('#'+deletevideo[ctr]).remove();
                    }
                },
                error: function(data){
                    alert(data);
                }

            });
    }