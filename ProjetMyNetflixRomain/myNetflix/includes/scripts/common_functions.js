function getAjaxRequestObject(){
	var xhr_object = null;

	if(window.XMLHttpRequest) // Firefox
		xhr_object = new XMLHttpRequest();
	else if(window.ActiveXObject) // Internet Explorer
		xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
	else { // XMLHttpRequest non supporté par le navigateur
		alert("Votre navigateur ne gère pas les requêtes Javascript");
		return null;
	}

	return xhr_object;
}
