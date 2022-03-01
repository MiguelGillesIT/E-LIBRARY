<?php 
    session_start();
    if(!isset($_POST['CodeClasse']) || !isset($_POST['LibelleClasse'])){
        $_SESSION['message'] = "CHAMP MANQUANT, VEUILLEZ LE REMPLIR";
        header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/FormClasse.php");
        exit();

    }else{
        //Verify if global variables of form are empty
        if(empty($_POST['CodeClasse']) || empty($_POST['LibelleClasse'])){
            $_SESSION['message'] = "CHAMP VIDE, VEUILLEZ LE REMPLIR";
            header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/FormClasse.php");
            exit();

        }else{
            include_once("testPDO.php");
            insertIntoClasse($db,$_POST['CodeClasse'],$_POST['LibelleClasse']);
            header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/FormClasse.php");
            exit();
        }
    }
?>