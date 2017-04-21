<?php

if (!isset($_SESSION['login'])){
    header('Location: connection.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Information joueur</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo dirname(dirname(dirname($_SERVER['PHP_SELF'])));?>/web/css/index_user_style.css"/>
</head>
<body>
<h1><?php echo $_SESSION['login']; ?></h1>
<fieldset>
    <legend>Fiche personnage </legend>
    <ul id = "state">

        <li>PV : <span id="pv"></span></li>
        <li>Mana : <span id="mana"></span></li>
        <li>Armure : <span id="armure"></span></li>
    </ul>

    <ul>
        <li>Nom : <span id="name"></span></li>
        <li>Titre : <span id="titre"></span></li>
        <li>Physique : <span id="physique"></span></li>
        <li>Mental : <span id="mental"></span></li>
        <li>Social : <span id="social"></span></li>
        <li>Magie : <span id="magie"></span></li>


    </ul>

</fieldset>

    <ul id="otherPlayers">

    </ul>
    <script src="<?php echo dirname(dirname(dirname($_SERVER['PHP_SELF']))) . '/vendor/jquery-3.2.1.min.js';?>"></script>
    <script>

        $(document).ready(function(){


            $.post(
                '<?php echo dirname(dirname($_SERVER['PHP_SELF']));?>/ajax/loading_user_data.php',
                {
                    name: "<?php echo $_SESSION['login']; ?>"
                },
                function(personnage){
                    for(let player in personnage.otherPlayers){
                        console.log(player);
                        let hp = personnage.otherPlayers[player].hp;
                        let hpMax = personnage.otherPlayers[player].statPhysique;
                        let mana = personnage.otherPlayers[player].mana;
                        let manaMax = personnage.otherPlayers[player].statMagie;
                        $("#otherPlayers").append(
                            '<li>' + player + '</li>'+
                                '<ul class = "stats">' +
                                    '<li class = "hp">PV : <progress class = "hpbarre" id = "' + player + '" value="' + hp +  '" min="0" max="' + hpMax + '"></progress></li>' +
                                    '<li class = "mana">Mana : <progress class="manabarre" id ="' + player + '" value="' + mana +  '" min="0" max="' + manaMax + '"></progress></li>' +
                                '</ul>'

                        );
                    }
                },
                'json'

            );

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
                        $("#social").html(personnage.statSocial);
                        $("#magie").html(personnage.statMagie);
                        $("#pv").html(personnage.hp);
                        $("#mana").html(personnage.mana);
                        $("#armure").html(personnage.armor);

                        for(let player in personnage.otherPlayers){
                            let hp = personnage.otherPlayers[player].hp;
                            let mana = personnage.otherPlayers[player].mana;
                            $(".hpbarre#" + player).val(hp);
                            $(".manabarre#" + player).val(mana);
                        }

                    },
                    'json'
                );
            },1000);

        });
    </script>
</body>
</html>