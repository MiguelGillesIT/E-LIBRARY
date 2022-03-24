<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
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
                        $fileType = htmlspecialchars($_POST['FileType']);
                        require("../model/model.php");
                        if($fileType === "excel"){

                        }elseif($fileType === "csv"){
                            insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"IMPORTATION DE LIVRES",date("Y/m/d"),date("h:i:sa"));
                            readBookCvsFile($_FILES['ImportedFile']['tmp_name']);
                            $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                            require("../view/importBookFormView.php");
                            unset($_SESSION['success_message']);

                        }elseif($fileType === "json"){
                            insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"IMPORTATION DE LIVRES",date("Y/m/d"),date("h:i:sa"));
                            readBookJsonFile($_FILES['ImportedFile']['tmp_name']);
                            $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                            require("../view/importBookFormView.php");
                            unset($_SESSION['success_message']);
                        }   }
                }
            }
        }
    }else{
        require("../view/unauthorizedAccessView.php");
    }



    // function to read Book JSON file
    function readBookJsonFile($filePath){
        $json = file_get_contents($filePath);
        $parsedJsonBook = json_decode($json)->{'book'};
        foreach( $parsedJsonBook as $books){
            foreach($books as $book){
                $Book = retrieveBookById($book->codeL);
                if(empty($Book)){
                    insertIntoBook(htmlspecialchars($book->codeL),htmlspecialchars($book->titreL),htmlspecialchars($book->auteurL),htmlspecialchars($book->genreL));
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
                insertIntoBook(htmlspecialchars($book[0]),htmlspecialchars($book[1]),htmlspecialchars($book[2]),htmlspecialchars($book[3]));
            }
        }
    }


