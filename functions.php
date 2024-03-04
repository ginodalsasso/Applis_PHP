<?php

function getNbProducts() { //affichera sur chaque session la qtt de produits au panier
    $nbProducts = 0;        //initialisation variable 
    if(isset($_SESSION["products"])) {
        foreach($_SESSION["products"] as $p) {
            $nbProducts += $p["qtt"];
        }
    }
    return $nbProducts;
}


function getMessages() {  //me permet de récupérer un message suite à l'action d'un utilisateur et de le retourner
    if(isset($_SESSION["messages"])) {
        $message = $_SESSION["messages"];
    }
    return $message;
}