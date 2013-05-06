$(document).ready(function(){

    $("#Register_Form").hide();
    $("#button_reg").click(function(){
        $("#Register_Form").dialog({
            autoOpen: true,
            show: "explode",
            hide: "explode",
            modal: "true",
            buttons: {
                "close": function(){
                    $("#Register_Form").dialog("close");
                }
            }
        });
    });
    $("#reg").click(function(){
        $.ajax({
            type: "POST",
            url: "AddMember.php",

            data: {
                "firstname":$("input[name = 'firstname']").val(),
                "middlename":$("input[name = 'middlename']").val(),
                "lastname": $("input[name ='lastname']").val(),
                "age": $("input[name = 'age']").val(),
                "address": $("input[name = 'address']").val(),
                "gender": $("#gender").val(),
                "username": $("input[name = 'username']").val(),
                "password": $("input[name = 'password']").val(),
                "type": $("input[name = 'type']").val(),

            },


            success:function(data){


                $('#entries').append(data);

            },

            error: function(data){

                alert("Error="+data);

            }
        });

    });

    $("#Log-inForm").hide();
    $("#button_log").click(function(){
        $("#Log-inForm").dialog({
            show: "explode",
            hide: "explode",
            modla: "true",
            buttons: {
                "close": function(){
                    $("#Log-inForm").dialog("close");
                }
            }
        });
    });


});

