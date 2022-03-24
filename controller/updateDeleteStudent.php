<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        require("../model/model.php");
        $classes = selectClasse();
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

                $student = retrieveStudentById($_GET["studentId"]);
                if(empty($student)){
                    $_SESSION['fail_message'] = "UTILISATEUR INCONNU";
                    require("../view/studentsView.php");
                    unset($_SESSION['fail_message']);
                }else{
                    $action = htmlspecialchars($_GET["action"]);
                    if($action === "delete"){
                        $studentId = htmlspecialchars($_GET["studentId"]);
                        unlink($student[0]["CV"]);
                        unlink($student[0]["photo"]);
                        deleteStudent($studentId);
                        $_SESSION['success_message'] = "SUPPRESSION REUSSIE";
                        require("../view/studentsView.php");
                        unset($_SESSION['success_message']);

                    }elseif($action === "update"){
                        $_SESSION['success_message'] = "MODIFICATION REUSSIE";
                        require("../view/studentsView.php");
                        unset($_SESSION['success_message']);
                    }
                }
            }
        }
    }else{
        require("../view/unauthorizedAccessView.php");
    }
