function validateNewForm() {
	var primage = document.forms.newForm.idimage.value;
	var prname = document.forms.newForm.idname.value;
	var prtype = document.forms.newForm.idtype.value;
	var prprice = document.forms.newForm.idprice.value;
	var prqty = document.forms.newForm.idqty.value;


	if ((prname === '') || (prtype === '') || (prprice === '') || (prqty === '')) {
		alert('Please fill in all the required fields');
		return false;
	}

	if (primage != '') {
	} else {
		alert("Please select the product image");
		return false;
	}

	if (prtype == 'noselection') {
		alert("Please select the product type");
		return false;
	}
}

function validateLoginForm() {
	var email = document.forms.loginForm.idemail.value;
	var pass = document.forms.loginForm.idpass.value;
	if ((email === '') || (pass === '')) {
		alert('Please fill in all required fields to proceed with your login');
		return false;
	}
	const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!re.test(String(email))) {
		alert('Please fill in correct email');
		return false;
	}
}

function validateRegForm() {
	var name = document.forms.registerForm.idname.value;
	var email = document.forms.registerForm.idemail.value;
	var phone = document.forms.registerForm.idphone.value;
	var pass = document.forms.registerForm.idpass.value;
	var passb = document.forms.registerForm.idpassb.value;

	if ((name === '') || (email === '') || (phone === '') || (pass === '') || (passb === '')) {
		alert('Please fill in all required fields to proceed with your registration');
		return false;
	}

	else if ((pass != passb)) {
		alert('Please make sure your password is matched with the re-enter password');
		return false;
	}


	const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!re.test(String(email))) {
		alert('Please fill in correct email');
		return false;
	}

	var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{5})$/;
	if (phone.match(phoneno)) {
		return true;
	}
	else {
		alert('Please fill in a valid phone number');
		return false;
	}

}