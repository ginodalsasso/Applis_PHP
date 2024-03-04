<?php
    session_start();
    ob_start();
?>
    <main class="container">
        <a href="index.php"><button class="btn btn-info mt-3 mb-3">Retour à l'index</button></a>
        <?php

            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){  //Soit la clé "products" du tableau de session $_SESSION n'existe pas : !isset()
                                                                                //Soit cette clé existe mais ne contient aucune donnée : empty()

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
                $addQtt = 0;

                foreach ($_SESSION['products'] as $id => $product){
                    $totalProduct = $product['qtt'] * $product['price']; //variable calculant le prix total en fonction de sa qtt
                    $totalGeneral += $totalProduct; //variable calculant le total général du panier
                    $addQtt += $product['qtt']; //variable calculant le total de qtt
                    echo "<tr>",
                            "<td>".$id."</td>",
                            "<td>".$product['name']."</td>",
                            "<td>".number_format($product['price'], 2, ",",  "&nbsp;"). "&nbsp;€</td>",
                            "<td><a href='traitement.php?action=down-qtt&id=$id' class='btn btn-danger'>-</a>", //traitement.php?action=down-qtt&id=$id  &id=$id = appelle la variable à modifier ou suprimer en fonction de ce que l'on veut
                            "<td>".number_format($product['qtt']),
                            "<td><a href='traitement.php?action=up-qtt&id=$id' class='btn btn-success'>+</a></td>",
                            "<td>".number_format($totalProduct, 2, ",",  "&nbsp;"). "&nbsp;€</td>",
                            "<td><a href='traitement.php?action=delete&id=$id' class='btn btn-outline-dark'>supprimer</a></td>", 
                        "</tr>";
                }

                echo "<tr>",
                        "<td colspan=4>Total général :</td>",
                        // affichage du total qtt
                        "<td><strong>".number_format($addQtt)."</strong></td>",  
                        "<td> </td>",
                        // affichage du total général
                        "<td colspan=3><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€<strong></td>",
                    "</tr>",  
                    "</tbody>",
                    "</table>",

                    "<a href='traitement.php?action=clear' class='btn btn-outline-secondary'>Suprimer totalité</a>";  //affichage du bouton dans le cas ou des produits sont en session sinon pas de boutton 
                }

            ?>    
    </main>

<?php
$title = "Récapitulatif des produits";
$content = ob_get_clean();
require_once "template.php"; ?>