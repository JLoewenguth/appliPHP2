<?php
    private int $size;

    session_start();


    // constructeur
    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function getSize():int
    {
        return $this->size;
    }
 
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function __toString() {
        return "$this->size";
    }

    public function afficherCompte() {
        $result = count($_SESSION['products']);
        return $result;
    }

    /*$_POST['size'] = count($_SESSION['products']);
    echo $_POST['size']." produits dans la liste.";*/

?>