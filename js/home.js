
$(function(){
      setInterval( "slideSwitch()", 1000 );
      $("#send").click(function(){
        
         $.ajax({
            type:"POST",
            url:"message.php",
            data:{"msg": $(".input-small").val()},
            success:function(data){
               console.log(data);             
               $(".you").append(data).outerHeight(true);
              
            },
            error:function(data){
               alert(data);
            
            }
         });
      });

});

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    $active.addClass('last-active');
        
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}


