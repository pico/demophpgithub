<?php
  Header('Cache-Control: no-cache');
  Header('Pragma: no-cache');
  date_default_timezone_set('UTC');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <title>Une dernière page PHP</title>

    <script src="http://aspnet-----------j1.azurewebsites.net/Scripts/jquery-1.6.4.min.js"></script>
    <script src="http://aspnet-----------j1.azurewebsites.net/Scripts/jquery.signalR-1.0.0-rc2.min.js"></script>
    <script src="http://aspnet-----------j1.azurewebsites.net/signalr/hubs" type="text/javascript"></script>
 
</head>
  <body class="container">
    
    <script type="text/javascript">
        $(function () {
            // déclaration du canal de communication
            var monCanal = $.connection.monHub;

            // Déclaration de la 
            // fonction de réception des messages en provenance du serveur
            monCanal.client.messageDepuisHub = function (message) {
                $('#messages').append('<li>' + message + '</li>');
            };

            // Etablissement de la connexion
            $.connection.hub.url = 'http://aspnet-----------j1.azurewebsites.net/signalr';
            $.connection.hub.start().done(function () {
                // Ajout de l'événement sur le click du bouton
                // pour envoyer le message au hub
                $("#broadcast").click(function () {
                    // Call the monCanal method on the server
                    monCanal.server.messageDepuisClient($('#msg').val());
                });
            });
        });
    </script>

    <h1>PHP et SignalR :)</h1>
    <div class="form-actions">
        <input type="text" class="input-block-level" id="msg" />
        <input type="button" id="broadcast" class="btn btn-small btn-success" value="Envoyer"/>
    </div>
    <div class="lead">
        <ul id="messages">
        </ul>
    </div>
    <p class="balba">Il est <?php $now = date('H:i:s'); echo $now; ?></p>
<?php echo phpinfo(); ?>
</body>
</html>
