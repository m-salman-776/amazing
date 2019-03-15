function loadImage(ref) {
	var text = ref.value;
	console.log(text);
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "user.php?"+text, true);
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	 document.getElementById("modal-image").src = xhttp.responseText.replace("</body>", "").replace("</html>", "");
	 console.log(xhttp.responseText);
	}
	};
	xhttp.send(text);
}