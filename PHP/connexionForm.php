<?php
    session_start();
    //Verify if global variables of form have been created
    if(!isset($_POST['Login']) || !isset($_POST['Password'])){
        $_SESSION['message'] = "CHAMP MANQUANT, CONNEXION ECHOUEE";
        header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/connexion.php");
        exit();

    }else{
        //Verify if global variables of form are empty
        if(empty($_POST['Login']) || empty($_POST['Password'])){
            $_SESSION['message'] = "CHAMP VIDE, CONNEXION ECHOUEE";
            header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/connexion.php");
            exit();

        }else{
            //Verify if Login is valid
            if(!filter_var($_POST['Login'], FILTER_VALIDATE_EMAIL)){
                $_SESSION['message'] = "E-mail invalide";
                header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/connexion.php");
                exit();

            }else{
                include_once("testPDO.php");
                retrieveUser($db,$_POST['Login'],$_POST['Password']);
            }
        }



    }
   
?>