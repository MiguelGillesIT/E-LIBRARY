<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        //Verify if global variables of form have been created
        if(!isset($_POST['Etudiant']) || !isset($_POST['Book'])){
            $_SESSION['fail_message'] = "CHAMP MANQUANT, CONNEXION ECHOUEE";
            require("../view/lendBookView.php");
            unset($_SESSION['fail_message']);

        }else{
            //Verify if global variables of form are empty
            if(empty($_POST['Etudiant']) || empty($_POST['Book'])){
                $_SESSION['fail_message'] = "CHAMP VIDE, CONNEXION ECHOUEE";
                require("../view/lendBookView.php");
                unset($_SESSION['fail_message']);

            }else {
                //Verify if Login's format is valid
                require("../model/model.php");
                $student = htmlspecialchars($_POST['Etudiant']);
                $book = htmlspecialchars($_POST['Book']);
                $Lend = retrieveLend($student,$book);
                if(!empty($Lend)){
                    $_SESSION['fail_message'] = "CET ETUDIANT N'A PAS RETOURNE LE LIVRE";
                    require("../view/lendBookView.php");
                    unset($_SESSION['fail_message']);
                }else{
                    lendBook(htmlspecialchars($_POST['Etudiant']),htmlspecialchars($_POST['Book']),date("d-m-y h:i:s"));
                    $_SESSION['success_message'] = "Livre Preté";
                    require("../view/lendBookView.php");
                    unset($_SESSION['success_message']);
                }
            }
        }
    }else{
        require("../view/unauthorizedAccessView.php");
    }
