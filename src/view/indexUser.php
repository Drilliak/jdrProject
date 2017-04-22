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
    <link rel="stylesheet" href="../../web/css/index_user_style.css"/>

    <script>
        if (screen.width <= 1024){
            document.write('<link rel="stylesheet" type="text/css" href="../../web/css/index_user_body_1024.css"');
        }
        if (screen.width > 1920){
            document.write('<link rel="stylesheet" type="text/css" href="../../web/css/index_user_body_2560.css"');
        }
        if (screen.width > 1600){
            document.write('<link rel="stylesheet" type="text/css" href="../../web/css/index_user_body_1920.css"');
        }
        if (screen.width > 1024){
            document.write('<link rel="stylesheet" type="text/css" href="../../web/css/index_user_body_1600.css"');
        }
    </script>
</head>


<body>
<fieldset>
    <legend> </legend>
    <p><span id="titre"></span></p>
    <div id="myImgContainer">
        <img id="myImg" src=""/>
    </div>
    <ul id = "state">

        <li>PV : <span id="pv"></span></li>
        <li>Mana : <span id="mana"></span></li>
        <li id="myarmor">Armure : <span id="armure"></span></li>
    </ul>

    <ul id="baseStats">
        <li id="nomList">Physique : <span id="physique"></span></li>
        <li>Mental : <span id="mental"></span></li>
        <li>Social : <span id="social"></span></li>
        <li>Magie : <span id="magie"></span></li>


    </ul>

</fieldset>

    <ul id="otherPlayers">

    </ul>
    <script src="../../vendor/jquery-3.2.1.min.js"></script>

    <script>

        $(document).ready(function(){


            $.post(
                '../ajax/loading_user_data.php',
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
                                    '<li class = "mana"><progress class="manabarre" id ="' + player + '" value="' + mana +  '" min="0" max="' + manaMax + '"></progress></li>' +
                                    '<li class = "hp"><progress class = "hpbarre" id = "' + player + '" value="' + hp +  '" min="0" max="' + hpMax + '"></progress></li>' +

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
                        '<progress  id="myMana" value="' + personnage.mana + '" min="0" max="' + personnage.statMagie+ '"></progress>'
                    );
                    $("legend").html(personnage.nom);

                },
                'json'

            );

            setInterval(function(){
                $.post(
                    '../ajax/loading_user_data.php',
                    {
                        name: "<?php echo $_SESSION['login']; ?>"
                    },
                    function(personnage){
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