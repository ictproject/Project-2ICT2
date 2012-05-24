function confirmation(target) {
	var answer = confirm("Bent u zeker?")
	if (answer){
		window.location = target;
	}
}