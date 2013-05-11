$(function(){
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

});


    function CustomerViewItem(){
        $.ajax({
            type:"POST",
            url:"customerViewItem.php",
            data:{"search":$("#search").val()},
            success:function(data){

            },
            error:function(data){
                alert(data);

            }

        });
    }

    function Buy(id){


    }






