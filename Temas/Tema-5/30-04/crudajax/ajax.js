function cargarContenido(abrir){

    var ajax = new XMLHttpRequest();//Crea el objeto ajax
    ajax.open("get", abrir, true);
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
            document.querySelector('#contenido').innerHTML = ajax.responseText;
        }
        ajax.setRequestHeader("Content-type", "text/html; charset=utf-8");
        ajax.send();
    }


}
function cargarContenido(abrir) {
    var ajax = new XMLHttpRequest();
    ajax.open("get", abrir, true); // abre una petición GET a "read.php"
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;
        }
    }
    ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
    ajax.send();
}
