function receive() {
	var incoming = document.getElementById("incoming");
	var latest_id = "initial";
	
	//make a function that makes an xml object, or use jquery. Do this whole project replacing javascript code with the jquery code.
	function updateMessages() {
		var xmlhttp;
		if (window.XMLHttpRequest) 
			xmlhttp = new XMLHttpRequest();
		else 
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		
		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				var response = JSON.parse(xmlhttp.responseText);
				for (var i = 0; i < Object.keys(response).length - 1; i++) {
					var time = document.createTextNode(response[i]['time']);
					var message = document.createTextNode(response[i]['message']);
					incoming.appendChild(time);
					incoming.appendChild(document.createElement("br")); 
					incoming.appendChild(message);
					incoming.appendChild(document.createElement("br"));
					incoming.appendChild(document.createElement("br"));
					incoming.scrollTop = incoming.scrollHeight;   
				}
				latest_id = response['latest_id'];
			
			//	updateMessages(); // try a timeout for this method if this is glitchy.
			  setTimeout(updateMessages, 500);		
			}
		};
		xmlhttp.open("GET", "receive.php?latest_id=" + latest_id, true);
		xmlhttp.send();
	}
	updateMessages();
}