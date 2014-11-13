function sendMessage(message) {
	var xmlhttp;
	if (window.XMLHttpRequest) 
		xmlhttp = new XMLHttpRequest();
	else 
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	
	var currentdate = new Date(); 
	var datetime = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + " @ "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
	
	xmlhttp.open("POST", "send.php", true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("message=" + message + "&time=" + datetime);
}
