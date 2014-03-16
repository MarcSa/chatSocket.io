var app= require("http")
	, io = require('socket.io').listen(8081)
	, fs = require('fs');

var data = {};

var browser = io.of("/nodejs").on('connection', function (socket){
	var hs = socket.handshake;

	socket.on('message', function(data){
		socket.broadcast.emit('broadcasted-message', data.text);
	});

	socket.on('disconnect', function(){
		console.log("id".error)
		console.log(socket.id)
		delete data[socket.id];
	});
});