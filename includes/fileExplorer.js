var classname = document.getElementsByClassName("etiquette");

for (var i = 0; i < classname.length; i++) {
	classname[i].oncontextmenu = function (event) { 
		alertName(this);
		return false //on annule l'affichage du menu contextuel
	}
}

function alertName(element) { 
	var content = element.firstChild.nodeValue;
	alert(content);
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
	var win = window.open(genURL(path), '_blank');
	if (win) {
		//Browser has allowed it to be opened
		win.focus();
		} else {
		//Browser has blocked it
		alert('Please allow popups for this website');
	}
}

function genURL(path){
	var ext = path.split(".").pop().toLowerCase();
	var isImg = 
		ext == "png" ||
		ext == "jpg" ||
		ext == "gif" ||
		ext == "jpeg"||
		ext == "tiff";
	if (isImg){
		return 'file.php?source='+path+'&type=img';
	} else {
		return 'file.php?source='+path+'&type=text';
	}
}