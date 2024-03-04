<?php
    session_start();
    ob_start();
?>

        <main class="container">
            <a href="recap.php"><button class="btn btn-info mt-3 mb-3">Retour au récap</button></a>
            <h1>Ajouter un produit</h1>
            
            
            <form action="traitement.php?action=add" method="post">
                <p>
                    <label class="form-label">
                        Nom du produit :
                        <input type="text" name="name" class="form-control" required>
                    </label>
                </p>
                <p>
                    <label class="form-label">
                        Prix du produit :
                        <input type="number" step="any" name="price" class="form-control" required>
                    </label>
                </p>
                <p>
                    <label class="form-label">
                        Quantité désirée :
                        <input type="number" name="qtt" value="1" class="form-control" required>
                    </label>
                </p>
                <p>
                    <input type="submit" name="submit" class="btn btn-success" value="Ajouter le produit">
                </p>
            </form>
        </main>
<?php

$title = "Ajout du produit"; // j'ajoute un titre à ma variable title qui se trouve dans mon template.

$content = ob_get_clean();
require_once "template.php"; ?>