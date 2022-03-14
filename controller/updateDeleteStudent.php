<?php
    session_start();
    if(!isset($_GET["action"]) || !isset($_GET["studentId"])){
        $_SESSION['fail_message'] = "CHAMP MANQUANT";
        require("../view/studentsView.php");
        unset($_SESSION['fail_message']);

    }else{
        if(empty($_GET["action"]) ||  empty($_GET["studentId"])){
            $_SESSION['fail_message'] = "CHAMP VIDE";
            require("../view/studentsView.php");
            unset($_SESSION['fail_message']);

        }else{
            require("../model/model.php");
            if($_GET["action"] === "delete"){
                deleteStudent($_GET["studentId"]);
                $classes = selectClasse();
                $_SESSION['success_message'] = "SUPPRESSION REUSSIE";
                require("../view/studentsView.php");
                unset($_SESSION['success_message']);

            }elseif($_GET["action"] === "update"){
                $classes = selectClasse();
                $_SESSION['success_message'] = "MODIFICATION REUSSIE";
                require("../view/studentsView.php");
                unset($_SESSION['success_message']);
            }
        }
    }