<?php



include_once 'Autoloader.php';

$connected = false;

$role = "player";

if ((isset($_POST['pseudo']) && isset($_POST['password']))) {

    $db = DBFactory::getPDOConnection();
    $userManager = new UserManager($db);

    $user = new User(array(
        'name'     => $_POST['pseudo'],
        'password' => hash("sha512", $_POST['password'])
    ));


    if ($userManager->exist($user)) {
        $connected = true;
        $user = $userManager->get($_POST['pseudo'], hash("sha512", $_POST['password']));
        $role = $user->getRole();
    }

    var_dump($user);

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta charset = "utf-8" />
</head>
<body>

    <?php

    if ($connected){
        echo "<p>Connecté en tant que " . $user->getName() . '</p>';
        echo "<a href='.'>Déconnexion</a>";
        if ($role == "player"){
        echo "vous êtes une petite pute de joueur sans aucun droit, ni talent";
        }
        if ($role == "gameMaster"){
        echo "bravo, vous êtes tibo";
    }

    } else {
        require('./src/view/authenticateForm.php' );
        echo "<a href='registration.php'>S'inscrire</a>";
    }



    ?>




    <script src="./vendor/jquery-3.2.1.min"></script>
    <script>
        setInterval(function(){
            $.post(
                "./src/ajax/test.php",
                {

                },
                function(data){
                    console.log(data);
                },
                'text'
            );
        },2000);


    </script>
</body>
</html>