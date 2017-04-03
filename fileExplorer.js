var classname = document.getElementsByClassName("etiquette");

for (var i = 0; i < classname.length; i++) {
	classname[i].oncontextmenu = function (event) { 
		var content = this.firstChild.nodeValue;
		alert(content);
		return false //on annule l'affichage du menu contextuel
	}
}

function alertName(element) { 
	var content = element.firstChild.nodeValue;
	alert(content);
	return false //on annule l'affichage du menu contextuel
}

function alertPath() { 
	var content = element.firstChild.nodeValue;
	alert(content);
	return false //on annule l'affichage du menu contextuel
}

function openDir(element){
	var details = element.parentElement.parentElement;
	if (details.open == true)
	details.open = false
	else 
	details.open = true;
}

function openFile(element){
	var path = element.dataset.path;
	var win = window.open('code.php?source='+path, '_blank');
	if (win) {
		//Browser has allowed it to be opened
		win.focus();
		} else {
		//Browser has blocked it
		alert('Please allow popups for this website');
	}
}