<?php
header($_SERVER["SERVER_PROTOCOL"] . ' 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: 300');
?>

<!doctype html>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <title>Flabilis</title>
    </head>
    <body style="margin:5px; width:100%; background-color: #F1F1F1;">
        <div style="position: absolute; width:100%; top: 50%; transform: translateY(-50%); text-align: center;">
            <a href="https://flabilis.com" target="fla"><img src="<?php print(plugins_url()); ?>/si-maintenance/flabilis.png" alt="Flabilis logo" style="max-width:100%;" /></a>
        </div>
    </body>
</html>