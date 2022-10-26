<h1>POO, appli php</h1>

<!DOCTYPE html>
<html lang="en">
<div id="bg">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--CSS-->
        <link rel="stylesheet" href="style.css">
        <title>Ajout produit</title>
    </head>


    <body>
    <div id="encadre"><h2>Ajouter un produit :</h2>
        <form action="traitement.php?action=addProduct" method="post">
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label>
                    Quantité :
                    <input type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
                <div class="myButton"><input type="submit" name="submit" value="Ajouter le produit"></div>
            </p>
        </form></div>
    </body></div>

    <!--<div class="compteur">Nb de produits : <?php  
            
            /*if (isset($_SESSION['products'])){
                echo sizeof($_SESSION['products']); 
            }
            else{
                echo "0";
            }*/
            ?>
        </div>-->

<!-- lien vers le récapitulatif produits -->
</br><a href="recap.php">Récapitulatif des produits</a>

</html>

<?php

//message de traitement.php
if(isset($_GET['Message'])){
    echo $_GET['Message'];
}

?>