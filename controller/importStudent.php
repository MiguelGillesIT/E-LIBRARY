<?php
    session_start();
    //Verify if global variables of form have been created
    if(!isset($_POST['FileType']) || !isset($_FILES['ImportedFile'])){
        $_SESSION['fail_message'] = "CHAMP MANQUANT, VEUILLEZ LE REMPLIR";
        require("../view/importStudentFormView.php");
        unset($_SESSION['fail_message']);

    }else{
        //Verify if global variables of form are empty
        if(empty($_POST['FileType']) ||  empty($_FILES['ImportedFile'])){
            $_SESSION['fail_message'] = "CHAMP VIDE, VEUILLEZ LE REMPLIR";
            require("../view/importStudentFormView.php");
            unset($_SESSION['fail_message']);

        }else{
            //If not insert classe into database
            if( !($_FILES['ImportedFile']['error'] == 0)){
                $_SESSION['fail_message'] = "ERREUR CHARGEMENT DU FICHIER";
                require("../view/importStudentFormView.php");
                unset($_SESSION['fail_message']);
            }else{
                $fileInfo = pathinfo($_FILES['ImportedFile']['name']);
                $fileExtension = $fileInfo['extension'];
                $allowedFileExtensions = ['cvs', 'json', 'xlsx'];

                //Verify if extensions are not right
                if (!(in_array($fileExtension, $allowedFileExtensions)) ){
                    $_SESSION['fail_message'] = "EXTENSION DE FICHIERS INVALIDES";
                    require("../view/importStudentFormView.php");
                    unset($_SESSION['fail_message']);
                }else{
                    require("../model/model.php");
                    if($_POST['FileType'] === "excel"){

                    }elseif($_POST['FileType'] === "csv"){
                        readStudentCvsFile($_FILES['ImportedFile']['tmp_name']);
                        $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                        require("../view/importStudentFormView.php");
                        unset($_SESSION['success_message']);

                    }elseif($_POST['FileType'] === "json"){
                        readStudentJsonFile($_FILES['ImportedFile']['tmp_name']);
                        $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                        require("../view/importStudentFormView.php");
                        unset($_SESSION['success_message']);
                }   }
            }
        }
    }

    // function to read Students JSON file
    function readStudentJsonFile($filePath){
        $json = file_get_contents($filePath);
        $parsedJsonStudent = json_decode($json)->{'student'};
        foreach( $parsedJsonStudent as $students){
            foreach($students as $student){
                $Student = retrieveStudentById($student->matricule);
                if(empty($Student)){
                    insertIntoStudent($student->matricule,$student->nom,$student->prenoms,$student->dateNaissance,$student->lieu,$student->sexe,$student->photo,$student->codeCl,$student->CV );
                }
            } 
        }
    }

    // function to read Students Excel file
    function readStudentXlsFile($filePath){

    }

    //function to read Students CVS file 
    function readStudentCvsFile($filePath){
        //Open the file.
        $loadedFile = fopen($filePath, "r");
        //Loop through the CSV rows.
        while (($student = fgetcsv($loadedFile, 0, ",")) !== FALSE) {
            $Student = retrieveStudentById($student[0]);
            if(empty($Student)){
                insertIntoStudent($student[0],$student[1],$student[2],$student[3],$student[4],$student[5],$student[6],$student[7],$student[8]);
            }
        }
    }


    