$(function(){

    function logout(){

            if(isset($_SESSION['authority'])){
            unset($_SESSION['authority']);
            session_destroy();

        }
     };

});

