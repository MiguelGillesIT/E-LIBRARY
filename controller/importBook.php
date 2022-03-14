<?php
session_start();
//Verify if global variables of form have been created
if(!isset($_POST['FileType']) || !isset($_FILES['ImportedFile'])){
    $_SESSION['fail_message'] = "CHAMP MANQUANT, VEUILLEZ LE REMPLIR";
    require("../view/importBookFormView.php");
    unset($_SESSION['fail_message']);

}else{
    //Verify if global variables of form are empty
    if(empty($_POST['FileType']) ||  empty($_FILES['ImportedFile'])){
        $_SESSION['fail_message'] = "CHAMP VIDE, VEUILLEZ LE REMPLIR";
        require("../view/importBookFormView.php");
        unset($_SESSION['fail_message']);

    }else{
        //If not insert classe into database
        if( !($_FILES['ImportedFile']['error'] == 0)){
            $_SESSION['fail_message'] = "ERREUR CHARGEMENT DU FICHIER";
            require("../view/importBookFormView.php");
            unset($_SESSION['fail_message']);
        }else{
            $fileInfo = pathinfo($_FILES['ImportedFile']['name']);
            $fileExtension = $fileInfo['extension'];
            $allowedFileExtensions = ['cvs', 'json', 'xlsx'];

            //Verify if extensions are not right
            if (!(in_array($fileExtension, $allowedFileExtensions)) ){
                $_SESSION['fail_message'] = "EXTENSION DE FICHIERS INVALIDES";
                require("../view/importBookFormView.php");
                unset($_SESSION['fail_message']);
            }else{
                require("../model/model.php");
                if($_POST['FileType'] === "excel"){

                }elseif($_POST['FileType'] === "csv"){
                    readBookCvsFile($_FILES['ImportedFile']['tmp_name']);
                    $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                    require("../view/importBookFormView.php");
                    unset($_SESSION['success_message']);

                }elseif($_POST['FileType'] === "json"){
                    readBookJsonFile($_FILES['ImportedFile']['tmp_name']);
                    $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                    require("../view/importBookFormView.php");
                    unset($_SESSION['success_message']);
                }   }
        }
    }
}

// function to read Book JSON file
function readBookJsonFile($filePath){
    $json = file_get_contents($filePath);
    $parsedJsonBook = json_decode($json)->{'book'};
    foreach( $parsedJsonBook as $books){
        foreach($books as $book){
            $Book = retrieveBookById($book->codeL);
            if(empty($Book)){
                insertIntoBook($book->codeL,$book->titreL,$book->auteurL,$book->genreL);
            }
        }
    }
}

// function to read Books Excel file
function readBookXlsFile($filePath){

}

//function to read Books CVS file
function readBookCvsFile($filePath){
    //Open the file.
    $loadedFile = fopen($filePath, "r");
    //Loop through the CSV rows.
    while (($book = fgetcsv($loadedFile, 0, ",")) !== FALSE) {
        $Book = retrieveBookById($book[0]);
        if(empty($Book)){
            insertIntoBook($book[0],$book[1],$book[2],$book[3]);
        }
    }
}


