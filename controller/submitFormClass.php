<?php 
    session_start();

    //Verify if global variables of form have been created
    if(!isset($_POST['CodeClasse']) || !isset($_POST['LibelleClasse'])){
        $_SESSION['fail_message'] = "CHAMP MANQUANT, VEUILLEZ LE REMPLIR";
        require("../view/classFormView.php");
        unset($_SESSION['fail_message']);

    }else{
        //Verify if global variables of form are empty
        if(empty($_POST['CodeClasse']) || empty($_POST['LibelleClasse'])){
            $_SESSION['fail_message'] = "CHAMP VIDE, VEUILLEZ LE REMPLIR";
            require("../view/classFormView.php");
            unset($_SESSION['fail_message']);

        }else{
            //If not insert classe into database
            require("../model/model.php");
            $classe = retrieveClasse($_POST['CodeClasse'],$_POST['LibelleClasse']);
            if(!(empty($classe))){
                $_SESSION['success_message'] = "Cette classe existe déja";
                require("../view/classFormView.php");
                unset($_SESSION['success_message']);

            }else{
                insertIntoClasse($_POST['CodeClasse'],$_POST['LibelleClasse']);
                $_SESSION['success_message'] = "Enregistrement Réussi";
                require("../view/classFormView.php");
                unset($_SESSION['success_message']);
            }
            
            
        }
    }
