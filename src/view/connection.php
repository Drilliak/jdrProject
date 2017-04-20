<?php
include_once '../../Autoloader.php';
Autoloader::register();

use Src\Model\DBFactory;
use Src\Model\User;
use Src\Model\UserManager;

$errorMessage = '';

// Si le formulaire a déjà été soumis (comme Hugo)
if (!empty($_POST)){

    // Si le mot de passe et le login ont bien été envoyés
    if (!empty($_POST['password']) && !empty($_POST['login'])){
        $userManager = new UserManager(DBFactory::getPDOConnection());
        $user = new User(array(
            "name" => $_POST['login'],
            "password" => hash("sha512", $_POST['password'])
        ));
        if ($userManager->exist($user)){
            session_start();
            $_SESSION['login'] = $user->getName();
            header('Location : http://localhost/jdrProject/src/view/test.php');
            exit;
        } else {
            $errorMessage = "Mauvais login et/ou mot de passe";
        }

    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="utf-8" />
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <fieldset>
            <legend>Identifiez-vous</legend>

            <?php
                if (!empty($errorMessage)){
                    echo '<p>' . htmlspecialchars($errorMessage) . '</p>';
                }
            ?>
            <p>
                <label for="login">Pseudo :</label>
                <input type="text" name="login" id="login" value="" />
            </p>
            <p>
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" value="" />
                <input type="submit" name="submit" value="Se connecter" />
            </p>
        </fieldset>

    </form>
</body>
</html>

