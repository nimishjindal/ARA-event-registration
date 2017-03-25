

function validateUser(field)
{
		if(!/^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/.test(field.trim())){
			return "invalid email adress";
		}
		else{
			return "";
		}
}

function validatePassrep()
{
	pass=document.forms["register"]["pswd"].value;
	repass=document.forms["register"]["repswd"].value;
	if(pass!=repass){ 		return "Password doesn't match";	}
	else{					return "";	}
}
function validateP(form)
{
	pass=form.pswd.value;
	repass=form.repswd.value;
	if(pass!=repass){
		alert("password doesnt match");
		return false;
	}
	else{
		return true;
	}
}
function validateNum(form)
{
	string=form.num.value;
	string=string.trim();
	if(string.length>10){
		document.getElementById("phno").innerHTML="phone number should not be greater than 10 digits";
		return false;
	}
	else if(isNaN(string)){
		document.getElementById("phno").innerHTML="Phone number should contain only digits";
		return false;
	}
	else{
		document.getElementById("phno").innerHTML="";
		return true;
	}
}
function validateR(form)
{
	if(validateUser(form.email.value)!=''){	
		document.getElementById("R_email").innerHTML=validateUser(form.email.value);
		document.getElementById("email").focus();
		return false;
	}
	else{
		document.getElementById("R_email").innerHTML='';
	}
	if(validatePassrep()!=''){
		document.getElementById("R_pass").innerHTML=validatePassrep();
		document.getElementById("pass").focus();
		return false;
	}
	else{
		document.getElementById("R_pass").innerHTML='';
	}
	return true;	
}
function validateL(form)
{
	fail=validateUser(form.regnum.value)
	if(fail=="")	{
		return true;
	}
	else {	
		alert(fail);
		return false;	
	}
}