<?php 
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
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
                $codeClasse = htmlspecialchars($_POST['CodeClasse']);
                $libelleClasse = htmlspecialchars($_POST['LibelleClasse']);
                $classe = retrieveClasse($codeClasse,$libelleClasse);
                if(!(empty($classe))){
                    $_SESSION['success_message'] = "Cette classe existe déja";
                    require("../view/classFormView.php");
                    unset($_SESSION['success_message']);

                }else{
                    insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"ENREGISTREMENT DE CLASSE",date("Y/m/d"),date("h:i:sa"));
                    insertIntoClasse($codeClasse,$libelleClasse);
                    $_SESSION['success_message'] = "Enregistrement Réussi";
                    require("../view/classFormView.php");
                    unset($_SESSION['success_message']);
                }


            }
        }
    }else{
        require("../view/unauthorizedAccessView.php");
    }

