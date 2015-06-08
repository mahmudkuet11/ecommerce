function addtocart(str){
	var product_id = str;
	var quantity = document.getElementById("quantity").value;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById(str).innerHTML="<a href=\"shoppingcart.php\">added to cart</a>";
		}
	  }
	if(document.getElementById(product_id).innerHTML == "Add to Cart"){
		xmlhttp.open("GET","core/add_to_cart.php?id="+product_id+"&quantity="+quantity,true);
		xmlhttp.send();
	}

}

function remove_order(str){
	
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  total = new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  total=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  total.onreadystatechange=function()
	  {
	  if (total.readyState==4 && total.status==200)
		{
			document.getElementById("total_price").innerHTML = total.responseText;
		}
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById(str+"tr").innerHTML = "";
			
			
		}
	  }
	xmlhttp.open("GET","core/remove_from_cart.php?id="+str,true);
	xmlhttp.send();
	total.open("GET","core/remove_from_cart.php?get=total",true);
	
	total.send();
	
	
	
}


function check_quantity(str,id){
	if(str.length == 0){
		alert("please enter a number");
		document.getElementById("quantity").value = 1;
		return;
	}else{
		for(i=0;i<str.length;i++){
			var a = str[i];
			if(a=='1'||a=='2'||a=='3'||a=='4'||a=='5'||a=='6'||a=='7'||a=='8'||a=='9'||a=='0'){}
			else {
				alert("please enter a number");
				document.getElementById("quantity").value = 1;
				return;
			}
		}
	}
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("response").innerHTML = xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","core/add_to_cart.php?id="+id+"&check="+str,true);
	xmlhttp.send();
}










