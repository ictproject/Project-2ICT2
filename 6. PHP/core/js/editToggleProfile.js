    
   window.onload = function() { 

       
       var editGeneral = document.getElementById('editGeneral');
       editGeneral.style.display = 'none';
       
       var editPicture = document.getElementById('editPicture');
       editPicture.style.display = 'none';
}  
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }