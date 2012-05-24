function openLiveFunctions() {
	newwindow=window.open('liveFunctions.php?p=' + presentationID,'name','height=400,width=800,screenX=400');
	if (window.focus) {newwindow.focus()}
	return false;
}