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

        //TODO: Usare enum!!!!
        if(xhttp.response != "Perfetto!"){
            document.getElementById('result').innerHTML = "Login fallito!";
        }else{
            document.getElementById('result').innerHTML = "Login effettuato con successo!";
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