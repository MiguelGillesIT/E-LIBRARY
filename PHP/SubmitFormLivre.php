<?php
    session_start();
    if( !isset($_POST['CodeLivre']) || !isset($_POST['TitreLivre']) || !isset($_POST['AuteurLivre']) || !isset($_POST['GenreLivre']) ){
        $_SESSION['message'] = "CHAMP MANQUANT, VEUILLEZ LE REMPLIR";
        header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/FormLivre.php");
        exit();

    }else{
        //Verify if global variables of form are empty
        if(empty($_POST['CodeLivre']) || empty($_POST['TitreLivre']) || empty($_POST['AuteurLivre']) || empty($_POST['GenreLivre']) ){
            $_SESSION['message'] = "CHAMP VIDE, VEUILLEZ LE REMPLIR";
            header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/FormLivre.php");
            exit();

        }else{
            include_once("testPDO.php");
            insertIntoBook($db,$_POST['CodeLivre'],$_POST['TitreLivre'],$_POST['AuteurLivre'],$_POST['GenreLivre']);
            header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/FormLivre.php");
            exit();
        }
    }
    
   
    
?>