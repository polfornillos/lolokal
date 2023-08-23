var dropbtn = document.getElementById("dropbtn");
function myFunction() 
{
  document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
    if (!event.target.matches('.triangle-down')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
   
  }
