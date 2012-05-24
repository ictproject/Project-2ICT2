$(function () {
    "use strict";
    
    // global vars
    var error_page = 'error.html';
    
    // Initialize the deck. 
    $.deck('.slide');
    
    // if user is running mozilla then use it's built-in WebSocket
    window.WebSocket = window.WebSocket || window.MozWebSocket;

    // if browser doesn't support WebSocket, just show some notification and exit
    if (!window.WebSocket) {
        window.location.replace(error_page);
        return;
    }

    // open connection
    var connection = new WebSocket('ws://127.0.0.1:1337');

    connection.onopen = function () {
        // Connection open        
    };

    connection.onerror = function (error) {
        // there were some problems with the connection
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

        // NOTE: if you're not sure about the JSON structure
        // check the server source code above
        if (json.type === 'navigation') { // first response from the server with user's color
            var message = json.data;
            if(message == 'next'){
				// go to next slide
				$.deck('next')
				
			}else if( message == 'prev'){
				// go to prev slide
				$.deck('prev')
			}
            
        } else {
            console.log('Hmm..., I\'ve never seen JSON like this: ', json);
        }
    };
    
   
	$(document).keydown(function(e){
		if (e.keyCode === 39 || e.keyCode === 38) {
			var msg = 'navigation$next';
			connection.send(msg);
		}
		if (e.keyCode === 37 || e.keyCode === 40) {
			var msg = 'navigation$prev';
			connection.send(msg);
		}
	});
   	
});// $(function ()



