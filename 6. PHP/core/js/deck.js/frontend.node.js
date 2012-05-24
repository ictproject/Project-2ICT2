$(function () {
    "use strict";
    
    // global vars
    var error_page = 'error.html';
    
    // Initialize the deck. 
    $.deck('.slide');
    
    // disable nav for touch devices
    $.deck('getContainer').unbind('touchstart.deck touchmove.deck touchend.deck');
    
    // if user is running mozilla then use it's built-in WebSocket
    window.WebSocket = window.WebSocket || window.MozWebSocket;

    // if browser doesn't support WebSocket, just show some notification and exit
    if (!window.WebSocket) {
    	alert('You have no support for websockets');
        window.location.replace(error_page);
        return;
    }
	
	// open connection
    var connection = new WebSocket( nodeServer, 'navigation');

	connection.onopen = function () {
        // Connection open 
        connection.send(presentationID); 
          
    };

    connection.onerror = function (error) {
        // there were some problems with the connection
        alert('Connection failure');
        window.location.replace(error_page);
    };

    // most important part - incoming messages
    connection.onmessage = function (message) {
        // try to parse JSON message. Because we know that the server always returns
        // JSON this should work without any problem but we should make sure that
        // the message is not chunked or otherwise damaged.
        try {
            var json = JSON.parse(message.data);
        } catch (e) {
            console.log('This doesn\'t look like a valid JSON: ', message.data);
            return;
        }

        if (json.type === 'navigation') {
        	$.deck('go', parseInt(json.data));
          	console.log(json.data);
        } else {
            console.log('Hmm..., I\'ve never seen JSON like this: ', json);
        }
    };
   
   	
});// $(function ()



