<?php
session_start();
//Verify if global variables of form have been created
if(!isset($_POST['FileType']) || !isset($_FILES['ImportedFile'])){
    $_SESSION['fail_message'] = "CHAMP MANQUANT, VEUILLEZ LE REMPLIR";
    require("../view/importClassFormView.php");
    unset($_SESSION['fail_message']);

}else{
    //Verify if global variables of form are empty
    if(empty($_POST['FileType']) ||  empty($_FILES['ImportedFile'])){
        $_SESSION['fail_message'] = "CHAMP VIDE, VEUILLEZ LE REMPLIR";
        require("../view/importClassFormView.php");
        unset($_SESSION['fail_message']);

    }else{
        //If not insert classe into database
        if( !($_FILES['ImportedFile']['error'] == 0)){
            $_SESSION['fail_message'] = "ERREUR CHARGEMENT DU FICHIER";
            require("../view/importClassFormView.php");
            unset($_SESSION['fail_message']);
        }else{
            $fileInfo = pathinfo($_FILES['ImportedFile']['name']);
            $fileExtension = $fileInfo['extension'];
            $allowedFileExtensions = ['cvs', 'json', 'xlsx'];

            //Verify if extensions are not right
            if (!(in_array($fileExtension, $allowedFileExtensions)) ){
                $_SESSION['fail_message'] = "EXTENSION DE FICHIERS INVALIDES";
                require("../view/importClassFormView.php");
                unset($_SESSION['fail_message']);
            }else{
                require("../model/model.php");
                if($_POST['FileType'] === "excel"){

                }elseif($_POST['FileType'] === "csv"){
                    readClassCvsFile($_FILES['ImportedFile']['tmp_name']);
                    $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                    require("../view/importClassFormView.php");
                    unset($_SESSION['success_message']);

                }elseif($_POST['FileType'] === "json"){
                    readClassJsonFile($_FILES['ImportedFile']['tmp_name']);
                    $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                    require("../view/importClassFormView.php");
                    unset($_SESSION['success_message']);
                }   }
        }
    }
}

// function to read Class JSON file
function readClassJsonFile($filePath){
    $json = file_get_contents($filePath);
    $parsedJsonClass = json_decode($json)->{'class'};
    foreach( $parsedJsonClass as $classes){
        foreach($classes as $class){
            $Class = retrieveClassById($class->codeCl);
            if(empty($Class)){
                insertIntoClasse($class->codeCl,$class->libelleCl);
            }
        }
    }
}

// function to read Classs Excel file
function readClassXlsFile($filePath){

}

//function to read Classs CVS file
function readClassCvsFile($filePath){
    //Open the file.
    $loadedFile = fopen($filePath, "r");
    //Loop through the CSV rows.
    while (($class = fgetcsv($loadedFile, 0, ",")) !== FALSE) {
        $Class = retrieveClassById($class[0]);
        if(empty($Class)){
            insertIntoClasse($class[0],$class[1]);
        }
    }
}


