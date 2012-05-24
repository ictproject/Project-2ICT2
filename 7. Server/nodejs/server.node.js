// http://ejohn.org/blog/ecmascript-5-strict-mode-json-and-more/
"use strict";

// Optional. You will see this name in eg. 'ps' or 'top' command
process.title = 'node-open-presentations';

// Port where we'll run the websocket server
var webSocketsServerPort = 8080;

// websocket and http servers
var webSocketServer = require('websocket').server;
var WebSocketRouter = require('websocket').router;
var http = require('http');

// list of currently connected clients (users)
var clients_nav = [ ];
var clients_nav_presentation_id = [ ];

var clients_chat = [ ];
var clients_chat_presentation_id = [ ];

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

var router = new WebSocketRouter();
router.attachServer(wsServer);

router.mount('*', 'navigation', function(request) {
	console.log((new Date()) + ' Connection from origin ' + request.origin + '.');
	var connection = request.accept(request.origin);
	
	// we need to know client index to remove them on 'close' event
    var index = clients_nav.push(connection) - 1;
    var presentationID = "";
    
    clients_nav_presentation_id.push(presentationID);
    
    console.log((new Date()) + ' Connection accepted.');

    // user sent some message
    connection.on('message', function(message) {
        if (message.type === 'utf8') { // accept only text
			// log and broadcast the message
			console.log((new Date()) + ' Received Message : ' + message.utf8Data);
			
			// first message is presentationID
			if (presentationID == ""){
				presentationID = message.utf8Data;
				clients_nav_presentation_id[index] = presentationID;
				console.log('Presentation: ' + presentationID);
			}else{
				var json = JSON.stringify({ type:'navigation', data: message.utf8Data });
						
				// broadcast message to all connected clients
				console.log(' Clients: ' + clients_nav.length);
				for (var i=0; i < clients_nav.length; i++) {
					if (presentationID == clients_nav_presentation_id[i]){
						clients_nav[i].sendUTF(json);
					}
				}
			}
		}
    });

    // user disconnected
    connection.on('close', function(connection) {
		console.log((new Date()) + " Peer "
			+ connection.remoteAddress + " disconnected.");
		// remove user from the list of connected clients
		clients_nav.splice(index, 1);
    });
	
});

/*
 * Chat connections
 */
router.mount('*', 'chatbox', function(request) {
	console.log((new Date()) + ' Connection from origin ' + request.origin + '.');
	var connection = request.accept(request.origin);
	
	// we need to know client index to remove them on 'close' event
    var index = clients_chat.push(connection) - 1;
    
    var presentationID = "";
    var username = "";
    
    clients_chat_presentation_id.push(presentationID);
	
    console.log((new Date()) + ' Connection accepted.');

    // user sent some message
    connection.on('message', function(message) {
        if (message.type === 'utf8') { // accept only text
			// log and broadcast the message
			
			
			// first message is presentationID
			if (presentationID == ""){
				presentationID = message.utf8Data;
				clients_chat_presentation_id[index] = presentationID;
				
				if ( history[presentationID] == null){
					history[presentationID] = new Array();
				}
				// send back chat history
			    if (history[presentationID].length > 0) {
			        connection.sendUTF(JSON.stringify( { type: 'history', data: history[presentationID]} ));
			    }
				
			}else if (username == ""){ // second message is username
				username = message.utf8Data;
				console.log((new Date()) + ' Connection - presentation: ' + presentationID + ' - username: ' + username);
			}else{
				var obj = {
	                time: (new Date()).getTime(),
	                text: message.utf8Data,
	                user: username
	            	};
	            // we want to keep history of all sent messages	
	            history[presentationID].push(obj);
	            history[presentationID] = history[presentationID].slice(-100); // last 100
	           	
				var json = JSON.stringify({ type:'chat', data: obj });
				
				// broadcast message to all connected clients
				console.log(' Send to : ' + presentationID);
				for (var i=0; i < clients_chat.length; i++) {
					if (presentationID == clients_chat_presentation_id[i]){
						clients_chat[i].sendUTF(json);
					}
				}
			}
		}
    });

    // user disconnected
    connection.on('close', function(connection) {
		console.log((new Date()) + " Peer "
			+ connection.remoteAddress + " disconnected.");
		// remove user from the list of connected clients
		clients_chat.splice(index, 1);
    });
	
});



