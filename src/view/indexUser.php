<?php

if (!isset($_SESSION['login'])){
    header('Location: connection.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Information joeeur</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo dirname(dirname(dirname($_SERVER['PHP_SELF'])));?>/web/css/index_user_style.css"/>
</head>
<body>
<h1><?php echo $_SESSION['login']; ?></h1>
<fieldset>
    <legend>Fiche personnage </legend>
    <ul>
        <li>Nom : <span id="name"></span></li>
        <li>Titre : <span id="titre"></span></li>
        <li>Physique : <span id="physique"></span></li>
        <li>Mental : <span id="mental"></span></li>
        <li>Social : <span id="social"></span></li>
        <li>Magie : <span id="magie"></span></li>
        <li>PV : <span id="pv"></span></li>
        <li>Mana : <span id="mana"></span></li>
        <li>Armure : <span id="armure"></span></li>

    </ul>

</fieldset>

    <script src="<?php echo dirname(dirname(dirname($_SERVER['PHP_SELF']))) . '/vendor/jquery-3.2.1.min.js';?>"></script>
    <script>
        $(document).ready(function(){
            setInterval(function(){
                $.post(
                    '<?php echo dirname(dirname($_SERVER['PHP_SELF']));?>/ajax/loading_user_data.php',
                    {
                        name: "<?php echo $_SESSION['login']; ?>"
                    },
                    function(personnage){
                        $("#name").html(personnage.nom);
                        $("#titre").html(personnage.titre);
                        $("#physique").html(personnage.statPhysique);
                        $("#mental").html(personnage.statMental);
                        $("#social").html(personnage.statsocial);
                        $("#magie").html(personnage.statMagie);
                        $("#pv").html(personnage.hp);
                        $("#mana").html(personnage.mana);
                        $("#armure").html(personnage.armor);

                    },
                    'json'
                );
            },1000);

        });
    </script>
</body>
</html>