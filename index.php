<!DOCTYPE html>
<html>
	<head>
		<title>
			Chat Room
		</title>
	<link rel="stylesheet" type="text/css" href="chat.css" />
	</head>
	<body>
		<h1 id="title"> Chat Room</h1>
		<div id="chatbox">
			<div id="incoming"></div>
			<form>
				<input id="out" type="textfield" name="message_out" value="" autofocus/> 
			    <input id="send" type="submit" name="Send" value="Send" /> 
		    </form>
			<div class="clear"> </div>
		</div>
		<script src="onload.js"></script>
		<script src="send.js"></script>
		<script src="receive.js"></script>
	</body>
</html>