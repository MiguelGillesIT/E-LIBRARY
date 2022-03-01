<?php
    session_start();/*
    if( !isset($_POST['MatriculeEtudiant']) || !isset($_POST['NomEtudiant']) || !isset($_POST['PrenomsEtudiant']) || !isset($_POST['DateNaissEtudiant']) || !isset($_POST['LieuNaissEtudiant']) || !isset($_POST['ClasseEtudiant']) || !isset($_FILES['PhotoEtudiant']) || !isset($_FILES['CVEtudiant'])){
        $_SESSION['message'] = "CHAMP MANQUANT, VEUILLEZ LE REMPLIR";
        header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/FormEtudiant.php");
        exit();

    }else{*/
        if( !($_FILES['PhotoEtudiant']['error'] == 0) || !($_FILES['CVEtudiant']['error'] == 0)){
            $_SESSION['message'] = "ERREUR LORS DU CHARGEMENT DE FICHIER";
            header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/FormEtudiant.php");
            exit();
        }else{
            
            $studentPhotoInfo = pathinfo($_FILES['PhotoEtudiant']['name']);
            $photoExtensions = $studentPhotoInfo['extension'];
            $allowedPhotoExtensions = ['jpg', 'jpeg', 'png'];

            $studentCVInfo = pathinfo($_FILES['CVEtudiant']['name']);
            $CVExtensions = $studentPhotoInfo['extension'];
            $allowedCVExtensions = ['pdf', 'docx'];
        
            if (/*!(in_array($photoExtensions, $allowedPhotoExtensions)) ||*/ !(in_array($CVExtensions, $allowedCVExtensions)) ){
                $_SESSION['message'] = "EXTENSION DE FICHIERS INVALIDES";
                header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/FormEtudiant.php");
                exit();
            }else{

            }
        }
        
    /*}*/
?>