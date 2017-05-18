function validerConnection() {
    var message;
    var nom = document.getElementById("nom").value;
    var chaineNom = new RegExp("^[A-Za-z][0-9]{4}$");
    if (!chaineNom.test(nom)) {
        message = '<div class="alert alert-danger"><strong>Entrez le nom dans le format spécifié</strong></div>';
        document.getElementById("messageErreur").innerHTML = message;
        document.getElementById("nom").value = "";
        afficherDiv("messageErreur");
        cacherDiv("messageSucces");
        return;
    }
    else{
        cacherDiv("messageErreur");
    }

    var pass = document.getElementById("pass").value;
    var chainePass = new RegExp("^EXAMEN|examen$");
    if (!chainePass.test(pass)) {
        message = '<div class="alert alert-danger"><strong>Entrez le mot de passe dans le format spécifié</strong></div>';
        document.getElementById("messageErreur").innerHTML = message;
        document.getElementById("pass").value = "";
        afficherDiv("messageErreur");
        cacherDiv("messageSucces");
        return;
    }
    else{
        cacherDiv("messageErreur");
    }

    var confPass = document.getElementById("confPass").value;
    if (confPass !== pass) { 
        message = '<div class="alert alert-danger"><strong>Confirmez le mot de passe</strong></div>';
        document.getElementById("messageErreur").innerHTML = message;
        document.getElementById("confPass").value = "";
        afficherDiv("messageErreur");
        cacherDiv("messageSucces");
        return;
    }
    else{
        cacherDiv("messageErreur");
    }

    var email = document.getElementById("email").value;
    var chaineEmail = new RegExp("^[0-9][A-Za-z]+@[A-Za-z]+[.](com|org|ca|edu)$");
    if (!chaineEmail.test(email)) {
        message = '<div class="alert alert-danger"><strong>Entrez le courriel dans le format spécifié</strong></div>';
        document.getElementById("messageErreur").innerHTML = message;
        document.getElementById("email").value = "";
        afficherDiv("messageErreur");
        cacherDiv("messageSucces");
        return;
    }
    else{
        cacherDiv("messageErreur");
    }
    afficherDiv("messageSucces");
    monFormulaire.submit();
}

function afficherDiv(dv){
    document.getElementById(dv).style.visibility = "visible";
}

function cacherDiv(dv){
    document.getElementById(dv).style.visibility = "hidden";
}