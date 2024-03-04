<?php
    // session_start();

    require_once("functions.php");
    // var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/applis_PHP/index.php">Index</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/applis_PHP/recap.php">Recap</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><strong><?= getNbProducts() ?></strong></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div id="messages">
            <?php
                if(isset($_SESSION["messages"]) && !empty($_SESSION["messages"])) { //si le message existe dans ma session ou s'il n'est pas nul alors le message s'affichera
                    echo getMessages(); 
                    unset($_SESSION["messages"]);  //enlève le message à chaque changement de session
                }
           ?>
        </div>  <!--  affichera le message suivant l'action de l'utilisateur dans le recap.php -->

        <div id="wrapper">

            <?= $content ?> <!-- ici le contenu de chacune de me vues ex: index.php, recap.php -->
            

        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    </body>
</html>