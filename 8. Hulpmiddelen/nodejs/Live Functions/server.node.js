// http://ejohn.org/blog/ecmascript-5-strict-mode-json-and-more/
"use strict";

// Optional. You will see this name in eg. 'ps' or 'top' command
process.title = 'node-test';

// Port where we'll run the websocket server
var webSocketsServerPort = 1337;

// websocket and http servers
var webSocketServer = require('websocket').server;
var http = require('http');

// list of currently connected clients (users)
var clients = [ ];

// latest 100 messages
var history = [ ];


/**
* HTTP server
*/
var server = http.createServer(function(request, response) {
    // Not important for us. We're writing WebSocket server, not HTTP server
});
server.listen(webSocketsServerPort, function() {
    console.log((new Date()) + " Server is listening on port " + webSocketsServerPort);
});

/**
* WebSocket server
*/
var wsServer = new webSocketServer({
    httpServer: server
});

// This callback function is called every time someone
// tries to connect to the WebSocket server
wsServer.on('request', function(request) {
    console.log((new Date()) + ' Connection from origin ' + request.origin + '.');

    // accept connection - you should check 'request.origin' to make sure that
    // client is connecting from your website
    var connection = request.accept(null, request.origin);
    // we need to know client index to remove them on 'close' event
    var index = clients.push(connection) - 1;
    
    // send back chat history
    if (history.length > 0) {
        connection.sendUTF(JSON.stringify( { type: 'history', data: history} ));
    }    
	
    console.log((new Date()) + ' Connection accepted.');

    // user sent some message
    connection.on('message', function(message) {
        if (message.type === 'utf8') { // accept only text
			// log and broadcast the message
			console.log((new Date()) + ' Received Message : ' + message.utf8Data);
			
			var username = 'anon';
			
			var str = message.utf8Data.split('$');
			
			var str_type = str[0];
			var str_message = str[1];
			
			var json;
			
			console.log('str_type:' + str_type);
			
			if(str_type == 'navigation'){
				json = JSON.stringify({ type:'navigation', data: str_message });
			}else if( str_type == 'chat'){
				var obj = {
                    time: (new Date()).getTime(),
                    text: str_message,
                    user: username
	            	};
	            // we want to keep history of all sent messages	
	            history.push(obj);
	            history = history.slice(-100); // last 100
	           	console.log(history[0]);
				json = JSON.stringify({ type:'chat', data: obj });
			}
			
			// broadcast message to all connected clients
			console.log(' Clients: ' + clients.length);
			for (var i=0; i < clients.length; i++) {
				clients[i].sendUTF(json);
			}
		}
    });

    // user disconnected
    connection.on('close', function(connection) {
		console.log((new Date()) + " Peer "
			+ connection.remoteAddress + " disconnected.");
		// remove user from the list of connected clients
		clients.splice(index, 1);
    });

});


