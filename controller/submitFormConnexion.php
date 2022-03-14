<?php
    session_start();
    //Verify if global variables of form have been created
    if(!isset($_POST['Login']) || !isset($_POST['Password'])){
        $_SESSION['fail_message'] = "CHAMP MANQUANT, CONNEXION ECHOUEE";
        require("../view/connexionView.php");
        unset($_SESSION['fail_message']);

    }else{
        //Verify if global variables of form are empty
        if(empty($_POST['Login']) || empty($_POST['Password'])){
            $_SESSION['fail_message'] = "CHAMP VIDE, CONNEXION ECHOUEE";
            require("../view/connexionView.php");
            unset($_SESSION['fail_message']);

        }else{
            //Verify if Login's format is valid
            if(!filter_var($_POST['Login'], FILTER_VALIDATE_EMAIL)){
                $_SESSION['fail_message'] = "E-mail invalide";
                require("../view/connexionView.php");
                unset($_SESSION['fail_message']);

            }else{
                require("../model/model.php");
                //Find the user and connect him to the application
                $Users = retrieveUser($_POST['Login'],$_POST['Password']);

                if(!empty($Users)){
                    foreach ($Users as $user){
                        if($user['e_mail'] === $_POST['Login']){
                            if(hash_equals($user['password'] , crypt($_POST['Password'], $user['password']))){
                                $_SESSION['connected'] = true;
                                $classes = selectClasse();
                                require("../view/studentsView.php");
                            }else{
                                $_SESSION['fail_message'] = "E-mail ou mot de passe incorrect";
                                require("../view/connexionView.php");
                                unset($_SESSION['fail_message']);
                            }
                        }else{
                            $_SESSION['fail_message'] = "E-mail ou mot de passe incorrect";
                            require("../view/connexionView.php");
                            unset($_SESSION['fail_message']);
                        }
                    }
                }else{
                    $_SESSION['fail_message'] = "E-mail ou mot de passe incorrect";
                    require("../view/connexionView.php");
                    unset($_SESSION['fail_message']);

                }
            }
        }



    }