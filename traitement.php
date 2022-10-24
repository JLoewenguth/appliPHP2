<?php
    session_start();

    switch($_GET["action"]) {
        case "addProduct" :   
            if(isset($_POST['submit'])){        //recherche la clé 'submit'
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
        
                if($name && $price && $qtt){    //check sanity
        
                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price*$qtt
                    ];
                    $Message = urlencode("</br></br>Liste mise à jour.");       //message en cas de nouvelles données
                    $_SESSION['products'][] = $product;                         //enregistrement produit
                }   else{
                    $Message = urlencode("</br></br>Données non valides.");     //message en cas de données invalides
                }
            }
        header("Location: recap.php");
        die;
        break;

        case "remove":                      //retirer un produit
            unset($_SESSION["products"][$_GET["id"]]);
            header("Location: recap.php");
            die;
            break;

        case "upQtt":                       //augmenter une qtt
            $_SESSION["products"][$_GET["id"]]['qtt']+=1;
            $_SESSION["products"][$_GET["id"]]['total']=$_SESSION["products"][$_GET["id"]]['total']+$_SESSION["products"][$_GET["id"]]['price'];
            header("Location: recap.php");
            break;

        case "downQtt":                     //diminuer une qtt
            if($_SESSION["products"][$_GET["id"]]['qtt']>1){
                $_SESSION["products"][$_GET["id"]]['qtt']-=1;
                $_SESSION["products"][$_GET["id"]]['total']=$_SESSION["products"][$_GET["id"]]['total']-$_SESSION["products"][$_GET["id"]]['price'];
            }
            elseif($_SESSION["products"][$_GET["id"]]['qtt']>0){
                unset($_SESSION["products"][$_GET["id"]]);
            }
            header("Location: recap.php");
            break;

        case "clear":                       //vider le panier
            unset($_SESSION["products"]);
            header("Location: recap.php");
            die;
            break;
    }


?>