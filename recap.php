<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Récapitulatif des produits</title>
</head>
<body>
    <main class="container">
        <a href="index.php"><button class="btn btn-info mt-3 mb-3">Retour à l'index</button></a>
        <?php

            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                echo "<p>Aucun produit en session...</p>";
            }
            else{
                echo "<table class='table table-striped table-hover'>",
                        "<thead>",
                            "<tr>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Prix</th>",
                                "<th></th>",
                                "<th>Quantité</th>",
                                "<th></th>",
                                "<th>Total</th>",
                                "<th></th>",
                            "</tr>",
                        "</thead>",
                        "<tbody>";
                $totalGeneral = 0;
                $totalProduct = 0;

                foreach ($_SESSION['products'] as $index => $product){
                    echo "<tr>",
                            "<td>".$index."</td>",
                            "<td>".$product['name']."</td>",
                            "<td>".number_format($product['price'], 2, ",",  "&nbsp;"). "&nbsp;€</td>",
                            "<td><a href='#' class='btn btn-danger'>-</a>",
                            "<td>".number_format($product['qtt']),
                            "<td><a href='#' class='btn btn-success'>+</a></td>",
                            "<td>".number_format($product['total'], 2, ",",  "&nbsp;"). "&nbsp;€</td>",
                            "<td><a href='#' class='btn btn-outline-dark'>suprimer</a></td>", 
                        "</tr>";
                    $totalProduct+=$product['qtt']; 
                    $totalGeneral+=$product['total'];

                }

                echo "<tr>",
                        "<td colspan=4>Total général :</td>",
                        // affichage du total qtt
                        "<td><strong>".number_format($totalProduct)."</strong></td>",  
                        // affichage du total général
                        "<td colspan=3><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€<strong></td>",
                    "</tr>",  
                    "</tbody>",
                    "</table>";
                }
        ?>
        <a href='traitement.php?action=clear' class='btn btn-outline-secondary'>Suprimer totalité</a>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

