/*var username_v = false;
var email_v = false;
var pass_v = false;
var con_pass_v = false;*/
function checkUsername(){
	var username = document.getElementById("username").value;

	if (username.length==0)
	  {
	  document.getElementById("username_error").innerHTML="<span style=\"color:red\">please enter an username</span>";
	  return;
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
			document.getElementById("username_error").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","core/ajax.php?name=username&q="+username,true);
	xmlhttp.send();
}

function checkEmail(){
	var email = document.getElementById("email").value;

	if (email.length==0)
	  {
	  document.getElementById("email_error").innerHTML="<span style=\"color:red\">please enter an email address</span>";
	  return;
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
			document.getElementById("email_error").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","core/ajax.php?name=email&q="+email,true);
	xmlhttp.send();	
}

function checkPass(){
	var re_pass = document.getElementById("re-password").value;
	var pass = document.getElementById("password").value;

	if (re_pass.length==0 || pass.length==0 || re_pass != pass)
	  {
	  document.getElementById("pass_error").innerHTML="<span style=\"color:red\">password didn't match</span>";
	  }
	  else{
		document.getElementById("pass_error").innerHTML="<span style=\"color:green\">password is ok!!</span>";
	  }
	
	
}

function receive_order(id){
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
			document.getElementById("receive_"+id).innerHTML="";
		}
	  }
	xmlhttp.open("GET","core/process_order.php?id="+id+"&status=received",true);
	xmlhttp.send();
}
function complete_order(id){
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
			document.getElementById("complete_"+id).innerHTML="";
		}
	  }
	xmlhttp.open("GET","core/process_order.php?id="+id+"&status=completed",true);
	xmlhttp.send();
}

function reject_order(id){
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
			document.getElementById("receive_"+id).innerHTML="";
			document.getElementById("complete_"+id).innerHTML="";
			document.getElementById("reject_"+id).innerHTML="";
		}
	  }
	xmlhttp.open("GET","core/process_order.php?id="+id+"&status=rejected",true);
	xmlhttp.send();
}







