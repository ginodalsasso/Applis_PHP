<?php
    session_start();

    if(isset($_GET['action'])){

        switch($_GET['action']){
            case "add":
                if(isset($_POST['submit'])){
        
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
                    if($name && $price && $qtt){
            
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];
            
                        $_SESSION['products'][] = $product;
                        //message lors de l'ajout d'un produit
                        $_SESSION["messages"] = "<div class='alert alert-success' role='alert'>Le produit a bien été ajouté</div>";

                        header("Location:index.php"); die;
                    }
                }
                break;

                //supprime l'article
            case "delete":
                unset($_SESSION["products"][$_GET["id"]]); //cherche dans le tableau products l'id du produit 
                //message lors de la suppression d'un produit
                $_SESSION["messages"] = "<div class='alert alert-danger' role='alert'>Le produit a bien été supprimé </div>";
                header("Location: recap.php"); die;
                break;
                
                //supprime le panier complet
            case "clear": 
                unset($_SESSION['products']);
                //message lors de la suppression totale du panier
                $_SESSION["messages"] = "<div class='alert alert-warning' role='alert'>Le panier à bien été vidé</div>";
                header("Location: recap.php"); die;
                break;
                
                //ajoute +1 à qtt
            case "up-qtt":
                $_SESSION["products"][$_GET["id"]]["qtt"] ++; //cherche la qtt dans et l'id dans le tableau afin de d'incrémenter

                header("Location: recap.php"); die;
                break;
                
                //enlève -1 à qtt
            case "down-qtt":
                if($_SESSION['products'][$_GET["id"]]["qtt"] == 1){  //si mon produit est inférieur à un alors il se supprime
                    unset($_SESSION["products"][$_GET["id"]]);
                } else {
                    $_SESSION["products"][$_GET["id"]]["qtt"] --; //sinon nous décrémentons
                }
                header("Location: recap.php"); die;
                break;
        }
    }
    
