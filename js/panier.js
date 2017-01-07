var url ="panier.php";
var timer = setInterval(getpanier,500); // set getcommand timer intervel to 0.05 sec
var timer = setInterval(getcommand,500);
$(function(){
	$(".cart").click(function(){
	var id = $("#iid").val();
		$.post(url,{action:"addpanier",id:id},function(data){
			if(data == "oui"){
				getpanier();
			}else{
				//alert(data);
				//echo($_SESSION['cart'][]);
			}
		});
		return false;
	});
});

function getpanier()
{
	$.post(url,{action:"getpanier"},function(data){
		$(".fa-fa-crosshairs").empty().append(data);
	});
	return false;
}
function getcommand()
{
	$.post(url,{action:"getcommand"},function(data){
		$(".panier").empty().append(data);
		//alert(data);
	});
	return false;
}

function deleteart(id){
	$(function(){
		$.post(url,{action:"deleteart",id:id},function(data){
			getcommand();
		});
	});
}








