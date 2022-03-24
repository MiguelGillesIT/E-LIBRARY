<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
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
                $codeLivre = htmlspecialchars($_POST['CodeLivre']);
                $Books = retrieveBookById($codeLivre);
                if(!(empty($Books))){
                    $_SESSION['success_message'] = "Cette ce livre existe déja";
                    require("../view/bookFormView.php");
                    unset($_SESSION['success_message']);

                }else{
                    insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"ENREGISTREMENT DE LIVRE",date("Y/m/d"),date("h:i:sa"));
                    insertIntoBook(htmlspecialchars($_POST['CodeLivre']),htmlspecialchars($_POST['TitreLivre']),htmlspecialchars($_POST['AuteurLivre']),htmlspecialchars($_POST['GenreLivre']));
                    $_SESSION['success_message'] = "Enregistrement Réussi";
                    require("../view/bookFormView.php");
                    unset($_SESSION['success_message']);

                }

            }
        }
    }else{
        require("../view/unauthorizedAccessView.php");
    }

    