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
<fieldset>
    <legend>Fiche personnage </legend>
    <div id="myImgContainer">
        <img id="myImg" src=""/>
    </div>
    <ul id = "state">

        <li>PV : <span id="pv"></span></li>
        <li>Mana : <span id="mana"></span></li>
        <li>Armure : <span id="armure"></span></li>
    </ul>

    <ul id="baseStats">
        <li id="nomList">Nom : <span id="name"></span></li>
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
                    $("#myImg").attr('src', personnage.image_grande);
                    for(let player in personnage.otherPlayers){
                        console.log(player);
                        let hp = personnage.otherPlayers[player].hp;
                        let hpMax = personnage.otherPlayers[player].statPhysique;
                        let mana = personnage.otherPlayers[player].mana;
                        let manaMax = personnage.otherPlayers[player].statMagie;
                        $("#otherPlayers").append(
                            '<div class ="infosAlliesNom"><li id="otherPlayerName">' + player + '</li>'+
                                '<div class="infosAllies"><ul class = "stats">' +
                                    '<li class = "hp">PV : <progress class = "hpbarre" id = "' + player + '" value="' + hp +  '" min="0" max="' + hpMax + '"></progress></li>' +
                                    '<li class = "mana">Mana : <progress class="manabarre" id ="' + player + '" value="' + mana +  '" min="0" max="' + manaMax + '"></progress></li>' +
                                '</ul>'+
                                '<img src="' + personnage.otherPlayers[player].image_petite + '" /></div></div>'

                        );
                    }
                    $("#pv").append(
                        '<span id="myHpValue">' + personnage.hp+'/'+personnage.statPhysique + '</span> <br>' +
                      '<progress  id="myHp" value="' + personnage.hp + '" min="0" max="' + personnage.statPhysique + '"></progress>'
                    );
                    $("#mana").append(
                        '<span id="myManaValue">' + personnage.mana+'/'+personnage.statMagie + '</span> <br>' +
                        '<progress  id="myMana" value="' + personnage.mana + '" min="0" max="' + personnage.statMental+ '"></progress>'
                    );

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

                        $("#myHpValue").html(personnage.hp+'/'+personnage.statPhysique);
                        $("#myHp").val(personnage.hp);

                        $("#myMana").val(personnage.mana);
                        $("#myManaValue").html(personnage.mana+ '/'+ personnage.statMagie);

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