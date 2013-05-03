$(function(){
ViewDisplay();
	$("#pick_color").click(function(){		
		$("#div_color").show();					
		$( "input[type=checkbox]" ).on( "click",DisplayTexbox());
	});
	
	
});
	function DisplayTexbox(){
		
		
	}
	
	
	function ViewDisplay(){
		$.ajax({
			type:"POST",
			url:"viewDisplay.php",
			success:function(data){
				$(".listview").append(data);
			},
			error:function(data){
				alert(data);
			}
		});
	
	}
	function BuyNow(item_id,price,name,brand){
		$("#shopping_cart").show('clip',2000);
		
		
		$.ajax({
			type:"POST",
			url:"buy.php",
			data:{'item_id':item_id,},
			success:function(data){
				
			},
			error:function(data){
				alert(data);			
			}
		
		});
		

	}
	
