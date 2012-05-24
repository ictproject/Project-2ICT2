    
   window.onload = function() { 
       var editTitle = document.getElementById('editTitle'); 
       var editDescription = document.getElementById('editDescription'); 
       var addUsers = document.getElementById('searchUsers');
       var images = document.getElementById('images');
       
       images.style.display = 'block';
       editTitle.style.display = 'none';
       editDescription.style.display = 'none';
       addUsers.style.display = 'none';
       
}  
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }