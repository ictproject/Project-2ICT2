
$(function () {
    "use strict";

    // for better performance - to avoid searching in DOM
    var content = $('#content');
    var input = $('#input');
    

    // if user is running mozilla then use it's built-in WebSocket
    window.WebSocket = window.WebSocket || window.MozWebSocket;

    // if browser doesn't support WebSocket, just show some notification and exit
    if (!window.WebSocket) {
        content.html($('<p>', { text: 'Sorry, but your browser doesn\'t '
                                    + 'support WebSockets.'} ));
        return;
    }

    // open connection
    var connection = new WebSocket('ws://127.0.0.1:1337');

    connection.onopen = function () {
        // Connection open
    };

    connection.onerror = function (error) {
        // just in there were some problems with conenction...
        content.html($('<p>', { text: 'Sorry, but there\'s some problem with your '
                                    + 'connection or the server is down.</p>' } ));
    };

    // most important part - incoming messages
    connection.onmessage = function (message) {
        // try to parse JSON message. Because we know that the server always returns
        // JSON this should work without any problem but we should make sure that
        // the massage is not chunked or otherwise damaged.
        try {
            var json = JSON.parse(message.data);
        } catch (e) {
            console.log('This doesn\'t look like a valid JSON: ', message.data);
            return;
        }

        // NOTE: if you're not sure about the JSON structure
        // check the server source code above
        if (json.type === 'message') { // first response from the server with user's color
            var message = json.data;
            content.html(json.data);
        } else {
            console.log('Hmm..., I\'ve never seen JSON like this: ', json);
        }
    };
    
    // onclick
    input.click(function(){
		var msg = $(this).val();
		
		connection.send(msg);
	});
	
	input.keydown(function(e){
		if (e.keyCode === 39) {
			var msg = 'Right arrow';
			connection.send(msg);
		}
		if (e.keyCode === 37) {
			var msg = 'Left arrow';
			connection.send(msg);
		}
	});
   	
});


