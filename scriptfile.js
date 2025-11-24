var language="hu";
var page="home";

function init() {
	setLanguage(language);
	document.getElementById("Content").innerHTML="<span class='Progress'><img src='pics/progress.gif' width='32' height='32' /></span>";
	loadPage(page);
}

function newPage(URL,width,height) {
	if (width=='0' || height=='0') window.open(URL, "", "");
	else window.open(URL, "", "location=1,status=1,scrollbars=1,width="+width+",height="+height);
}

function newFrame(URL, height) {
	document.getElementById("Content").innerHTML = "<iframe src='" + URL + "' width='780' height='" + height + "'></iframe>";
}

function loadPage(pageName) {
	page=pageName;
	pageName = page + "_" + language + ".html";
	
	changePage(pageName, "Content");
	
	if (page=="olimpia" || page=="inverz" || page=="rodeo" || page=="kontra" ||
		page=="tukor" || page=="porgo" || page=="csuklo" || page=="tukormini") {
		changePage("comment.php?bicycle=" + page, "Comment");
	}
	else {
		changePage("null.html", "Comment");
	}
}

function changePage(pageName, contextName) {	
	var xmlhttp;
	
	$('#'+contextName).fadeTo(0,0.5);
	
	if (window.XMLHttpRequest) {		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else {								// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState==4 || xmlhttp.status==200) {
			$('#'+contextName).fadeTo(0, 1.0);
			document.getElementById(contextName).innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",pageName,true);
	xmlhttp.overrideMimeType("text/html; charset=ISO-8859-2");
	xmlhttp.send();
}

function setLanguage(languageName) {
	language=languageName;
	
	switch(language) {
		case 'en':
			document.title = "The special bicycles of Jeno Bori";
			document.getElementById("home").innerHTML="Homepage";
			document.getElementById("olimpia").innerHTML="Olympic bike";
			document.getElementById("inverz").innerHTML="Inverted bike";
			document.getElementById("rodeo").innerHTML="Rodeo bike";
			document.getElementById("kontra").innerHTML="Kontra bike";
			document.getElementById("tukor").innerHTML="Mirror tandem";
			document.getElementById("porgo").innerHTML="Spin bike";
			document.getElementById("csuklo").innerHTML="Swing bike";
			document.getElementById("tukormini").innerHTML="Mirror mini velocipede";
			document.getElementById("photos").innerHTML="Pictures";
			document.getElementById("videos").innerHTML="Videos";
			break;
		case 'hu':
			document.title = "Bori Jenõ különleges kerékpárjai";
			document.getElementById("home").innerHTML="Kezdõlap";
			document.getElementById("olimpia").innerHTML="Olimpiabicikli";
			document.getElementById("inverz").innerHTML="Inverzbicikli";
			document.getElementById("rodeo").innerHTML="Rodeobicikli";
			document.getElementById("kontra").innerHTML="Kontrabicikli";
			document.getElementById("tukor").innerHTML="Tükörtandem";
			document.getElementById("porgo").innerHTML="Pörgõ bringa";
			document.getElementById("csuklo").innerHTML="Csukló bringa";
			document.getElementById("tukormini").innerHTML="Tükör-minivelocipéd";
			document.getElementById("photos").innerHTML="Képek";
			document.getElementById("videos").innerHTML="Videók";
			break;
	}
}

function changeLanguage(languageName) {
	setLanguage(languageName);
	loadPage(page);
}

// Menu on top
$('#Left').waypoint(function(event, direction) {
	$(this).parent().toggleClass('sticky', direction === "down");
	event.stopPropagation();
});