<DOCTYPE HTML>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>Erreur</title>
        </head>
        <body>
            <h1>Erreur</h1>
            <p>
                <?php echo $erreur; ?>
            </p>
        </body>

<?php
    if(isset($dataVueErreur))
    {
        foreach($dataVueErreur as $value)
        {
            echo $value;
        }
    }

?>