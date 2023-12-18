document.addEventListener("DOMContentLoaded",makeRequest);  //per vedere se è già presente un utente connesso al caricamento della pagina
document.getElementById("btn-login").addEventListener("click",prepareLoginRequest);

function prepareLoginRequest(){
    makeRequest("username="+document.getElementById("floatingInput").value+"&password="+document.getElementById("floatingPassword").value);
}

function makeRequest(param) {

    var xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if(this.status==200)
            new Function(this.responseText)();  //per eseguire i comandi ricevuti dal server
    }

    xhttp.open("POST","login.php",true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send(param);

}

function mostraErrore(err){
    document.getElementById('result').innerHTML = "Errore: "+err;
}