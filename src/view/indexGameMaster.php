<?php



if (!isset($_SESSION['login'])){
    header('Location: connection.php');
    exit();
}
if (strtolower($_SESSION['role']) != 'gamemaster'){
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Information maître du jeu </title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo dirname(dirname(dirname($_SERVER['PHP_SELF'])));?>/web/css/index_game_master_style.css"/>
</head>
<body>

    <h1>Maitre du jeu</h1>
    <table>
        <tr id="header">
            <td class="user">Utilisateur</td>
            <td class="personnage">Personnage</td>
            <td class="titre">Titre</td>
            <td class="statPhysique">Physique</td>
            <td class="statMental">Mental</td>
            <td class="statSocial">Social</td>
            <td class="statMagie">Magie</td>
            <td class="hp">PV</td>
            <td class="mana">Mana</td>
            <td class="armor">Armor</td>
        </tr>


    </table>

    <script src="<?php echo dirname(dirname(dirname($_SERVER['PHP_SELF']))) . '/vendor/jquery-3.2.1.min.js';?>"></script>
    <script>

        function ajaxLoad(){
            return $.get(
                '../ajax/loading_admin_data.php',
                {

                },
                function(data){
                    console.log(data);
                    for(user of data){
                        $("table").append(
                            '<tr id="' + user.id_personnage + '">' +
                            '<td class = "user"><p>' + user.name +'</p>' +
                            '<td class = "personnage"><p>' + user.personnage.nom + '</td>' +
                            '<td class = "titre"><input value="' + user.personnage.titre + '"></td>' +
                            '<td class = "statPhysique"><input value="' + user.personnage.statPhysique + '"></td>' +
                            '<td class = "statMental"><input value="' + user.personnage.statMental + '"></td>' +
                            '<td class = "statSocial"><input value="' + user.personnage.statSocial + '"></td>' +
                            '<td class = "statMagie"><input value="' + user.personnage.statMagie + '"></td>' +
                            '<td class = "hp"><input value="' + user.personnage.hp + '"></td>' +
                            '<td class = "mana"><input value="' + user.personnage.mana + '"></td>' +
                            '<td class = "armor"><input value="' + user.personnage.armor + '"></td>' +
                            '</tr>');
                    }
                },
                'json'
            );
        }

        $(document).ready(function(){
            $.when(ajaxLoad()).done(function(a){
                let changedAttr;
                let changedVal;
                let id_personnage;

                $("input").keypress(function(e){
                    if (e.which == 13){
                        changedAttr = $(this).parent().attr("class");
                        changedVal = $(this).val();
                        id_personnage = $(this).parent().parent().attr("id");

                        $.post(
                            '<?php echo dirname(dirname($_SERVER['PHP_SELF']));?>/ajax/update_admin_data.php',
                            {
                                changedAttr: changedAttr,
                                changedVal: changedVal,
                                id_personnage: id_personnage
                            },
                            function(data){
                                console.log(data);
                            },
                            'json'
                        );

                    }
                });
                $("input").on("focusout", function(){
                    tdClass = $(this).parent().attr("class");
                    trId = $(this).parent().parent().attr("id");
                });
            })






        });
    </script>
</body>
</html>