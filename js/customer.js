$(function(){

    $("#reg").click(function(){
       var entry = {
           "firstname":$("input[name = 'firstname']").val(),
           "middlename":$("input[name = 'middlename']").val(),
           "lastname": $("input[name ='lastname']").val(),
           "age": $("input[name = 'age']").val(),
           "address": $("input[name = 'address']").val(),
           "gender": $("#gender").val(),
           "username": $("input[name = 'username']").val(),
           "password": $("input[name = 'password']").val(),
           "contact": $("input[name = 'contactNum']").val()

       };


        $.ajax({
            type: "POST",
            url: "Register.php",
            data: entry,
            success:function(data){
              alert("data="+data);
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

    //editing customer

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



