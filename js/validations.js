function validateName(){
	var field=document.msgForm.name;
		
	if(field.value==""){
		field.value="Please enter name.";
		return false;
	}
	return true;
}

function validateEmail(){
	var field=document.msgForm.email;
	var emailPattern = /^[a-zA-Z0-9_\.\-]+\@[a-zA-Z0-9\-]+\.[a-zA-Z\.]{2,5}$/;
	
	if(field.value==""){
		field.value="Please enter email.";
		return false;
	}else{
		if(!emailPattern.test(field.value)){
			field.value="Please enter valid email.";
			return false;
		}
	}
	return true;
}

function validateMsg(){
	var field=document.msgForm.msg;
		
	if(field.value==""){
		field.value="Please enter message.";
		return false;
	}
	return true;
}

function validateForm()
{
	var name = validateName();
	var email = validateEmail();
    var msg = validateMsg();
	
	if(name && email && msg){
		return true;
	}else{
		return false;
	}
}