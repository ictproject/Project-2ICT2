$(function () {
    "use strict";
    
    // global vars
    var error_page = 'error.html';
    
 	var content = $('#content');
    var input = $('#input');
    var status = $('#status');
    
    var username = 'anon';
    
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
       	input.removeAttr('disabled');
        status.text( username + ':');
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
		
		if (json.type === 'history') {
			 for (var i=0; i < json.data.length; i++) {
			 	addMessage(json.data[i].user, json.data[i].text, new Date(json.data[i].time));
            }
		}
        
        if (json.type === 'chat') {
        	input.removeAttr('disabled').focus();
			addMessage(json.data.user, json.data.text , new Date(json.data.time));
        }
        
    };
    
    /**
	* Send mesage when user presses Enter key
	*/
    input.keydown(function(e) {
        if (e.keyCode === 13) {
            var msg = $(this).val();
            if (!msg) {
                return;
            }
            // send the message as an ordinary text
            connection.send('chat$' + msg);
            $(this).val('');
            // disable the input field to make the user wait until server
            // sends back response
            input.attr('disabled', 'disabled');
    	}
    });
    
    /**
	* Add message to the chat window
	*/
	
	function addMessage(user, message, dt) {
	    content.append('<p><span>' + user + '</span> @ ' +
	         + (dt.getHours() < 10 ? '0' + dt.getHours() : dt.getHours()) + ':'
	         + (dt.getMinutes() < 10 ? '0' + dt.getMinutes() : dt.getMinutes())
	         + ': ' + message + '</p>');
	         
        content.prop({ scrollTop: content.prop("scrollHeight")}); // keep scroll bottom
	}
    
   	
});// $(function ()



