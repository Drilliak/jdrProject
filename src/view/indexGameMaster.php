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
    <link rel="stylesheet" href="../../web/css/index_game_master_style.css"/>
</head>
<body>

    <h1>Maître du jeu</h1>
    <div id="contenu">
        <table>
            <tr id="header">
                <td class="smallImage"></td>
                <td class="user">Utilisateur</td>
                <td class="personnage">Personnage</td>
                <td class="titre">Titre</td>
                <td class="statPhysique">Physique</td>
                <td class="statMental">Mental</td>
                <td class="statSocial">Social</td>
                <td class="statMagie">Magie</td>
                <td class="hp">PV</td>
                <td class="mana">Mana</td>
                <td class="armor">Armure</td>
            </tr>
        </table>
    </div>

    <div id="chat">
        <ul id="messages">

        </ul>
        <textarea id="currentMessage" type="text"></textarea>
        <input type="submit" value="Envoyer"/>
    </div>
    <script src="../../vendor/jquery-3.2.1.min.js"></script>
    <script>

        function ajaxLoad(){
            return $.get(
                '../ajax/loading_admin_data.php',
                {

                },
                function(data){
                    for(user of data){
                        console.log(user);
                        $("table").append(
                            '<tr id="' + user.id_personnage + '" class="userdata">' +
                            '<td class = "smallImage"><img src="' +user.personnage.image_petite + '" /></td>' +
                            '<td class = "user"><p>' + user.name +'</p>' +
                            '<td class = "personnage"><p>' + user.personnage.nom + '</td>' +
                            '<td class = "titre"><input value="' + user.personnage.titre + '"></td>' +
                            '<td class = "statPhysique"><input value="' + user.personnage.statPhysique + '"></td>' +
                            '<td class = "statMental"><input value="' + user.personnage.statMental + '"></td>' +
                            '<td class = "statSocial"><input value="' + user.personnage.statSocial + '"></td>' +
                            '<td class = "statMagie"><input value="' + user.personnage.statMagie + '"></td>' +
                            '<td class = "hp"><input value="' + user.personnage.hp + '" type="number"></td>' +
                            '<td class = "mana"><input value="' + user.personnage.mana + '" type="number"></td>' +
                            '<td class = "armor"><input value="' + user.personnage.armor + '"></td>' +
                            '</tr>');
                    }
                },
                'json'
            );
        }

        function chatLoad(){
            return $.get(
                '../ajax/loading_admin_chat.php',
                {

                },
                function(messages){
                    console.log(messages)
                    for (let mes of messages){
                        $("#messages").append(
                            '<li>' + mes.message + '</li>'
                        );
                    }
                },
                'json'
            )
        }


        $(document).ready(function(){
            $.when(ajaxLoad(), chatLoad()).done(function(a,b){
                let changedAttr;
                let changedVal;
                let id_personnage;

                $("input").keypress(function(e){
                    if (e.which == 13){
                        changedAttr = $(this).parent().attr("class");
                        changedVal = $(this).val();
                        id_personnage = $(this).parent().parent().attr("id");

                        $.post(
                            '../ajax/update_admin_data.php',
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
                    changedAttr = $(this).parent().attr("class");
                    changedVal = $(this).val();
                    id_personnage = $(this).parent().parent().attr("id");

                    $.post(
                        '../ajax/update_admin_data.php',
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


                    });

                $("#chat input").click(function(e){
                    $("#messages").append(
                      '<li>' + $("#currentMessage").val().replace('\n', '<br>') + '</li>'
                    );
                    $.post(
                        '../ajax/add_message_admin.php',
                        {
                            message: $("#currentMessage").val().replace('\n', '<br>')
                        },
                        function(data){

                        },
                        'json'
                    )
                    $("#currentMessage").val("");
                    $("#currentMessage").focus();

                });
                });
            });
    </script>
</body>
</html>