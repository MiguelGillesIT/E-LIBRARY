<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
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
                        $fileType = htmlspecialchars($_POST['FileType']);
                        require("../model/model.php");
                        if($fileType === "excel"){

                        }elseif($fileType === "csv"){
                            insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"IMPORTATION DE CLASSES",date("Y/m/d"),date("h:i:sa"));
                            readClassCvsFile($_FILES['ImportedFile']['tmp_name']);
                            $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                            require("../view/importClassFormView.php");
                            unset($_SESSION['success_message']);

                        }elseif($fileType === "json"){
                            insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"IMPORTATION DE CLASSES",date("Y/m/d"),date("h:i:sa"));
                            readClassJsonFile($_FILES['ImportedFile']['tmp_name']);
                            $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                            require("../view/importClassFormView.php");
                            unset($_SESSION['success_message']);
                        }   }
                }
            }
        }
    }else{
        require("../view/unauthorizedAccessView.php");
    }


    // function to read Class JSON file
    function readClassJsonFile($filePath){
        $json = file_get_contents($filePath);
        $parsedJsonClass = json_decode($json)->{'class'};
        foreach( $parsedJsonClass as $classes){
            foreach($classes as $class){
                $Class = retrieveClassById($class->codeCl);
                if(empty($Class)){
                    insertIntoClasse(htmlspecialchars($class->codeCl),htmlspecialchars($class->libelleCl));
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
                insertIntoClasse(htmlspecialchars($class[0]),htmlspecialchars($class[1]));
            }
        }
    }


