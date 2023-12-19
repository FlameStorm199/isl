//document.addEventListener("DOMContentLoaded",makeRequest);  //per vedere se è già presente un utente connesso al caricamento della pagina
document.getElementById("btn-login").addEventListener("click",prepareLoginRequest);

function prepareLoginRequest(){
    makeRequest('{"Username":"'+document.getElementById("floatingInput").value+'", "Password":"'+document.getElementById("floatingPassword").value+'"}');
}

function makeRequest(param) {
    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "http://localhost:5207/Login/CheckUser", true); //In teoria qua si può implementare che si può inserire un qualsiasi indirizzo ip
    xhttp.onload = () => {
        /*if(this.status==200){
            var response = JSON.parse(xhttp.response);
            
        }else{
            //var response = JSON.parse();
            console.log("Errore: "+xhttp.response);
        }*/

        if(xhttp.response == 1){
            document.getElementById('result').innerHTML = "Login effettuato con successo";
            window.location.href = "benvenuto.php";
        }else if(xhttp.response == 2){
            document.getElementById('result').innerHTML = "Credenziali errate!";
        }else if(xhttp.response == 3){
            document.getElementById('result').innerHTML = "Un'eccezione è stata lanciata durante il login.";
        }else{
            document.getElementById('result').innerHTML = "Chiamata API fallita.";
        }

        console.log("Response: "+xhttp.response); 
    };

    console.log(param);
    //xhttp.setRequestHeader("Access-Control-Allow-Headers", "content-type");
    xhttp.setRequestHeader("content-type","application/json");
    var data = JSON.stringify({"Username": document.getElementById("floatingInput").value, "Password": document.getElementById("floatingPassword").value});
    xhttp.send(data);
    console.log("ok");
}

function mostraErrore(err){
    document.getElementById('result').innerHTML = "Errore: "+err;
}