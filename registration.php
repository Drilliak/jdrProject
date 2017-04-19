<?php


include_once './src/model/DBFactory.php';
include_once './src/model/UserManager.php';
include_once './src/model/User.php';

?>


<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
<form method="post" action = "registration.php">
    <label for="pseudo">Pseudo :</label>
    <input type="text" name="pseudo" id="pseudo" />

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" />

    <input type="submit" value="Se connecter" />

</form>


<?php

if (isset($_POST['pseudo']) && isset($_POST['password'])){
    $db = DBFactory::getPDOConnection();
    $userManager = new UserManager($db);
    $user = new User(array(
            "name" => $_POST['pseudo'],
            "password" =>hash('sha512',$_POST['password']),
            "role" => "player"
    ));

    if ($userManager->add($user)){
        echo 'Inscription réussie, vous allez être redirigé(e) dans 5 secondes';
        echo "<script type='text/javascript'>

        setTimeout(function(){
            document.location.replace('index.php');
        },5000);
        
        </script>";
    } else {
        echo "Échec de l'inscription, veuillez réessayer ou contacter ce gros tocard de Drilliak";
    }


}

?>



</body>
</html>