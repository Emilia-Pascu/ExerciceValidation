<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        <title></title>
    </head>
    <body>
        <?php
              $nomErr = $passErr = $confPassErr = $emailErr = $msgSucces = "";
              $nom = $pass = $confPass = $email = "";  
              $isValid = true;
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["nom"])) {
                    $nomErr = "Le nom est requis";
                    $isValid = false;
                } else {
                    $nom = test_input($_POST["nom"]);               
                    if (!preg_match("/^[A-Za-z][0-9]{4}$/",$nom)) {
                        $nomErr = "Entrez le nom dans le format spécifié"; 
                        $isValid = false;
                    }
                }

                if (empty($_POST["pass"])) {
                    $passErr = "Le mot de passe est requis";
                    $isValid = false;
                } else {
                    $pass = test_input($_POST["pass"]);               
                    if (!preg_match("/^EXAMEN|examen$/",$pass)) {
                        $passErr = "Entrez le mot de passe dans le format spécifié"; 
                        $isValid = false;
                    }
                }

                
                if (empty($_POST["confPass"])) {
                    $confPassErr = "La confirmation du mot de passe est requise";
                    $isValid = false;
                } else {
                    $confPass = test_input($_POST["confPass"]);                                 
                    if ($confPass !== $pass) {
                        $confPassErr = "Confirmez le mot de passe"; 
                        $isValid = false;
                    }
                }

                if (empty($_POST["email"])) {
                    $emailErr = "Le courriel est requis";
                    $isValid = false;
                } else {
                    $email = test_input($_POST["email"]);               
                    if (!preg_match("/^[0-9][A-Za-z]+@[A-Za-z]+[.](com|org|ca|edu)$/",$email)) {
                        $emailErr = "Entrez le courriel dans le format spécifié"; 
                        $isValid = false;
                    }
                }

                if($isValid){
                    $msgSucces = '<div class="alert alert-success"><strong>Connexion réussie</strong></div>';
                }
                else{
                    $msgSucces = "";
                }
                
            }
            
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
            
        ?>
        <div class="container">
            <div class="jumbotron" id="jumbo">
                <div class="page-header">
                    <h1>Connectez-vous</h1>
                </div>
                <form id="monFormulaire" name="monFormulaire" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nom">Nom d'utilisateur</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="P1234">
                        </div>
                        <div class="col-sm-3">
                            <span class="error"> <?php echo $nomErr;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pass">Mot de passe</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="EXAMEN ou examen">
                        </div>
                        <div class="col-sm-3">
                            <span class="error"> <?php echo $passErr;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="confPass">Mot de passe</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="confPass" name="confPass" placeholder="Confirmez le mot de passe">
                        </div>
                        <div class="col-sm-3">
                            <span class="error"> <?php echo $confPassErr;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Adresse e-mail:</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="email" name="email" placeholder="3emilia@yahoo.com">
                        </div>
                        <div class="col-sm-3">
                            <span class="error"> <?php echo $emailErr;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="button" class="btn btn-default" onclick="validerConnection();" value="Valider" />
                        </div>
                    </div>
                </form>
                <div id="messageErreur"></div>
                <div id="messageSucces"><?php echo $msgSucces;?></div>
            </div>
        </div>
    </body>
</html>

