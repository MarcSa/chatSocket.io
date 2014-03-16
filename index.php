<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NodeJs</title>
	<link rel="stylesheet" href="stylesheets/screen.css">
	<script>
	var ip = '192.168.1.128';	
	</script>
	<script src="http://192.168.1.128:8081/socket.io/socket.io.js"></script>
	<script src="js/jquery-1.11.0.min.js"></script>
	<script>
		var chat= io.connect ('http://'+ip+':8081/nodejs');
		$(document).ready (function(){
			chat.on('connect', function(){
				$("#text-button").click(function(){
					chat.emit("message", {"text": $("#text").val()});
				});
			})
			chat.on('broadcasted-message', function(message){
				$(".message-container").append("<p>"+message+"</p>")
			})
		});
	</script>
</head>
<body>
	<div class="section-container" id="chat">
		<textarea name="" id="text" cols="50" rows="10">Lorem Ipsum</textarea>
		<input type="button" id="text-button" value="enviar mensaje">
		<div class="message-container"></div>
	</div>
</body>
</html>