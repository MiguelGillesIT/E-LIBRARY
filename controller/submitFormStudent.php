<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        //Verify if global variables of form have been created
        if( !isset($_POST['MatriculeEtudiant']) || !isset($_POST['NomEtudiant']) || !isset($_POST['PrenomsEtudiant']) || !isset($_POST['DateNaissEtudiant']) || !isset($_POST['LieuNaissEtudiant']) || !isset($_POST['SexeEtudiant']) || !isset($_POST['ClasseEtudiant']) || !isset($_FILES['PhotoEtudiant']) || !isset($_FILES['CVEtudiant'])){
            $_SESSION['fail_message'] = "CHAMP MANQUANT, VEUILLEZ LE REMPLIR";
            require("../view/studentFormView.php");
            unset($_SESSION['fail_message']);

        }else{
            //Verify if global variables of form are empty
            if(empty($_POST['MatriculeEtudiant']) || empty($_POST['NomEtudiant']) || empty($_POST['PrenomsEtudiant']) || empty($_POST['DateNaissEtudiant']) || empty($_POST['LieuNaissEtudiant']) || empty($_POST['SexeEtudiant']) || empty($_POST['ClasseEtudiant']) || empty($_FILES['PhotoEtudiant']) || empty($_FILES['CVEtudiant'])){
                $_SESSION['fail_message'] = "CHAMP VIDE, VEUILLEZ LE REMPLIR";
                require("../view/studentFormView.php");
                unset($_SESSION['fail_message']);

            }else{
                //Verify if files have been uploaded with errors
                if( !($_FILES['PhotoEtudiant']['error'] == 0) || !($_FILES['CVEtudiant']['error'] == 0)){
                    $_SESSION['fail_message'] = "ERREUR LORS DU CHARGEMENT DE FICHIER";
                    require("../view/studentFormView.php");
                    unset($_SESSION['fail_message']);

                }else{
                    //If global variables of form have been created gather those files extentions
                    $studentPhotoInfo = pathinfo($_FILES['PhotoEtudiant']['name']);
                    $photoExtensions = $studentPhotoInfo['extension'];
                    $allowedPhotoExtensions = ['jpg', 'jpeg', 'png'];



                    $studentCVInfo = pathinfo($_FILES['CVEtudiant']['name']);
                    $CVExtensions = $studentCVInfo['extension'];
                    $allowedCVExtensions = ['pdf', 'docx'];

                    //Verify if extensions are not right
                    if (!(in_array($photoExtensions, $allowedPhotoExtensions)) || !(in_array($CVExtensions, $allowedCVExtensions)) ){
                        $_SESSION['fail_message'] = "EXTENSION DE FICHIERS INVALIDES";
                        require("../view/studentFormView.php");
                        unset($_SESSION['fail_message']);

                    }else{
                        //If not write files on CV and PHOTO directories and rename them
                        $OldphotoPath = '../public/uploads/PHOTO/' . basename($_FILES['PhotoEtudiant']['name']);
                        $OldCVPath = '../public/uploads/CV/' . basename($_FILES['CVEtudiant']['name']);
                        move_uploaded_file($_FILES['PhotoEtudiant']['tmp_name'], $OldphotoPath);
                        move_uploaded_file($_FILES['CVEtudiant']['tmp_name'], $OldCVPath);

                        $newPhotoPath = "../public/uploads/PHOTO/".$_POST['MatriculeEtudiant'].".".$photoExtensions;
                        $newCVPath = "../public/uploads/CV/".$_POST['MatriculeEtudiant'].".".$CVExtensions;

                        rename($OldphotoPath,$newPhotoPath);
                        rename($OldCVPath,$newCVPath);

                        //Insert student into database
                        require("../model/model.php");
                        $classeId = retrieveIdClasseByLibelle(htmlspecialchars($_POST['ClasseEtudiant']));
                        $Classes = selectClasse();
                        $Students = retrieveStudentById(htmlspecialchars($_POST['MatriculeEtudiant']));
                        if(!empty($Students)){
                            $_SESSION['success_message'] = "Cet étudiant existe déja";
                            require("../view/studentFormView.php");
                            unset($_SESSION['success_message']);

                        }else{
                            insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"ENREGISTREMENT ETUDIANT",date("Y/m/d"),date("h:i:sa"));
                            insertIntoStudent(htmlspecialchars($_POST['MatriculeEtudiant']),htmlspecialchars($_POST['NomEtudiant']),htmlspecialchars($_POST['PrenomsEtudiant']),htmlspecialchars($_POST['DateNaissEtudiant']),htmlspecialchars($_POST['LieuNaissEtudiant']),htmlspecialchars($_POST['SexeEtudiant']),htmlspecialchars($newPhotoPath),htmlspecialchars($classeId[0]["codeCl"]),htmlspecialchars($newCVPath));
                            $_SESSION['success_message'] = "Enregistrement Réussi";
                            require("../view/studentFormView.php");
                            unset($_SESSION['success_message']);

                        }

                    }
                }
            }


        }

    }else{
        require("../view/unauthorizedAccessView.php");
    }
