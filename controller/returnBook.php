<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        if(!isset($_GET["StudentId"]) || !isset($_GET["CodeL"])){
            $_SESSION['fail_message'] = "INFORMATION INEXISTANTES";
            require("../view/returnLendBookView.php");
            unset($_SESSION['fail_message']);

        }else{
            if(empty($_GET["StudentId"]) ||  empty($_GET["CodeL"])){
                $_SESSION['fail_message'] = "INFORMATION MANQUANTE";
                require("../view/returnLendBookView.php");
                unset($_SESSION['fail_message']);

            }else{
                require("../model/model.php");
                insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"RETOUR DE LIVRE",date("Y/m/d"),date("h:i:sa"));
                returnBook(htmlspecialchars($_GET["StudentId"]),htmlspecialchars($_GET["CodeL"]),htmlspecialchars(date("d-m-y h:i:s")));
                $_SESSION['success_message'] = "LIVRE RETOURNER";
                $Lends = SelectNotFinishedLend();
                require("../view/returnLendBookView.php");
                unset($_SESSION['success_message']);

            }
        }
    }else{
        require("../view/unauthorizedAccessView.php");
    }
