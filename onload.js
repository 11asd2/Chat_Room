window.onload = function() {
	// put all event handlers under a prepare() event later on, and call prepare() from here, including below 2 lines.
	sendButton = document.getElementById("send");
	textOut = document.getElementById("out");
	receive();	// start receiving messages
	sendButton.onclick = function() { // because this is a closure, textOut doesn't need to be a global variable
		var text = textOut.value;  
		if (text == "")                             
			return false;               
		sendMessage(text);	  
		textOut.value = ""; 
		return false;      	
	};                      
};                                    