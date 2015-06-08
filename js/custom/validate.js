function check_add_product_form(){
	if(document.add_product_form.product_name.value == ""){
		alert("please enter a product name");
		document.add_product_form.product_name.focus();
		return false;
	}
	if(document.add_product_form.product_description.value == ""){
		alert("please enter a product description");
		document.add_product_form.product_description.focus();
		return false;
	}
	if(document.add_product_form.price.value == ""){
		alert("please enter a valid price");
		document.add_product_form.price.focus();
		return false;
	}else{
		var price = document.add_product_form.price.value;
		for(i=0;i<price.length;i++){
			var a = price[i];
			if(a=='1'||a=='2'||a=='3'||a=='4'||a=='5'||a=='6'||a=='7'||a=='8'||a=='9'||a=='0'){}
			else {
				alert("please enter a valid price");
				document.add_product_form.price.focus();
				return false;
			}
		}
	}
	if(document.add_product_form.availability.value == ""){
		alert("please enter a valid quantity");
		document.add_product_form.availability.focus();
		return false;
	}else{
		var price = document.add_product_form.availability.value;
		for(i=0;i<price.length;i++){
			var a = price[i];
			if(a=='1'||a=='2'||a=='3'||a=='4'||a=='5'||a=='6'||a=='7'||a=='8'||a=='9'||a=='0'){}
			else {
				alert("please enter a valid quantity");
				document.add_product_form.availability.focus();
				return false;
			}
		}
	}
	if(document.add_product_form.model.value == ""){
		alert("please enter a model");
		document.add_product_form.model.focus();
		return false;
	}
	if(document.add_product_form.manufacturer.value == ""){
		alert("please enter a manufacturer");
		document.add_product_form.manufacturer.focus();
		return false;
	}
	return true;
}

function check_checkout_form(){
	if(document.checkout_form.name.value == ""){
		alert("please enter your name");
		document.checkout_form.name.focus();
		return false;
	}
	if(document.checkout_form.address.value == ""){
		alert("please enter your address");
		document.checkout_form.address.focus();
		return false;
	}
	if(document.checkout_form.city.value == ""){
		alert("please enter your city");
		document.checkout_form.city.focus();
		return false;
	}
	if(document.checkout_form.country.value == ""){
		alert("please enter your country");
		document.checkout_form.country.focus();
		return false;
	}
	if(document.checkout_form.email.value == ""){
		alert("please enter your email");
		document.checkout_form.email.focus();
		return false;
	}else{
		 /*email = document.checkout_form.email.value;
		 at = 0;
		 flag = 0;
		 index = 0;
		 dot = 0;
		 for(i=0;i<email.length;i++){
			if(email[i] == "@"){
				at++;
				flag++;
				index = i;
				break;
			}
		 }
		 for(i=index;i<email.length;i++){
			if(email[i] == "."){
				dot++;
			}
		 }
		 if(at>1 || dot>1 || flag == 0){
			alert("invalid email");
			return false;
		 }*/
		 
		email = document.checkout_form.email.value; 
		at = 0;
		at_index = 0;
		dot = 0;
		for(i=0; i<email.length; i++){
			if(email[i] == '@'){
				at++;
				if(!at_index) at_index++;
			}
		}
		for(i=at_index; i<email.length; i++){
			if(email[i] == '.' && email[i+1] == '.'){
				dot = 0;
				break;
			}else if(email[i] == '.'){
				dot++;
			}
		}
		if(at == 1 && dot >= 1 && email[email.length - 1] != '.'){
			
		}else {
			alert("please enter a valid email address!!!");
			document.checkout_form.email.focus();
			return false;
		}
		
		
	}
	if(document.checkout_form.phone.value == ""){
		alert("please enter your phone");
		document.checkout_form.phone.focus();
		return false;
	}else{
		phone = document.checkout_form.phone.value;
		for(i=0;i<phone.length;i++){
			var a = phone[i];
			if(a=='1'||a=='2'||a=='3'||a=='4'||a=='5'||a=='6'||a=='7'||a=='8'||a=='9'||a=='0'){}
			else {
				alert("please enter a valid phone number");
				document.checkout_form.phone.focus();
				return false;
			}
		}
	}
	
	
	
	return true;
}

function validate_register_form(){
	if(document.register_form.username.value == ""){
		alert("please enter your username");
		document.register_form.username.focus();
		return false;
	}
	if(document.register_form.email.value == ""){
		alert("please enter your email");
		document.register_form.email.focus();
		return false;
	}
	if(document.register_form.password.value == ""){
		alert("please enter your password");
		document.register_form.password.focus();
		return false;
	}
	if(document.register_form.confirm_password.value == ""){
		alert("please confirm your password");
		document.register_form.confirm_password.focus();
		return false;
	}
	if(document.register_form.confirm_password.value != document.register_form.password.value){
		alert("password didnt match");
		document.register_form.password.focus();
		return false;
	}
	return true;
}
function validate_login_form(){
	if(document.login_form.username.value == ""){
		alert("please enter username");
		document.login_form.username.focus();
		return false;
	}
	if(document.login_form.password.value == ""){
		alert("please enter password");
		document.login_form.password.focus();
		return false;
	}
	return true;
}


