var i = 1;
var del = document.getElementById('del');
var plu = document.getElementById('plu');
window.onclick = function (event) {
    if (event.target == plu) {
        i++;
        document.getElementById('am').innerHTML = i;
    }
    else {
        if (i <= 1) {
            document.getElementById('am').innerHTML = 1;
        }
        else {
            i--;
            document.getElementById('am').innerHTML = i;
        }
    }
}

