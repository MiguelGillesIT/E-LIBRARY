<?php
    session_start();

    //Verify if global variables of form have been created
    if( !isset($_POST['CodeLivre']) || !isset($_POST['TitreLivre']) || !isset($_POST['AuteurLivre']) || !isset($_POST['GenreLivre']) ){
        $_SESSION['fail_message'] = "CHAMP MANQUANT, VEUILLEZ LE REMPLIR";
        require("../view/bookFormView.php");
        unset($_SESSION['fail_message']);

    }else{
        //Verify if global variables of form are empty
        if(empty($_POST['CodeLivre']) || empty($_POST['TitreLivre']) || empty($_POST['AuteurLivre']) || empty($_POST['GenreLivre']) ){
            $_SESSION['fail_message'] = "CHAMP VIDE, VEUILLEZ LE REMPLIR";
            require("../view/bookFormView.php");
            unset($_SESSION['fail_message']);

        }else{
            //If not insert the book into database
            require("../model/model.php");
            $Books = retrieveBookById($_POST['CodeLivre']);
            if(!(empty($Books))){
                $_SESSION['success_message'] = "Cette ce livre existe déja";
                require("../view/bookFormView.php");
                unset($_SESSION['success_message']);

            }else{
                insertIntoBook($_POST['CodeLivre'],$_POST['TitreLivre'],$_POST['AuteurLivre'],$_POST['GenreLivre']);
                $_SESSION['success_message'] = "Enregistrement Réussi";
                require("../view/bookFormView.php");
                unset($_SESSION['success_message']);

            }

        }
    }
    