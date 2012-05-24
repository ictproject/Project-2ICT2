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
	var connection = new WebSocket( nodeServer, 'navigation');
	
	
	connection.onopen = function () {
        // Connection open 
        connection.send(presentationID); 
        
        $(document).bind('deck.change', function(event, from, to) {
   		connection.send(to);
		});     
    };

    connection.onerror = function (error) {
        // there were some problems with the connection
        window.location.replace(error_page);
    };
  
   	
});// $(function ()



