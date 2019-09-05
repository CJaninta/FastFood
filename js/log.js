var modal = document.getElementById('idf');
var user = document.getElementById('id01');
window.onclick = function (event) {
     if (event.target == modal) {
         modal.style.display = "none";
    }
}

window.onclick = function (event) {
    if (event.target == user) {
        user.style.display = "none";
   }
}