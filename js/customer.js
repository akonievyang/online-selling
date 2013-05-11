$(function(){


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

            },
            error:function(data){
                alert(data);

            }

        });
    }

    function Buy(id){


    }






