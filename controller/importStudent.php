<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
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
                        $fileType = htmlspecialchars($_POST['FileType']);

                        if($fileType === "excel"){

                        }elseif($fileType === "csv"){
                            insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"IMPORTATION D'ETUDIANTS",date("Y/m/d"),date("h:i:sa"));
                            readStudentCvsFile($_FILES['ImportedFile']['tmp_name']);
                            $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                            require("../view/importStudentFormView.php");
                            unset($_SESSION['success_message']);

                        }elseif($fileType === "json"){
                            insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"IMPORTATION D'ETUDIANTS",date("Y/m/d"),date("h:i:sa"));
                            readStudentJsonFile($_FILES['ImportedFile']['tmp_name']);
                            $_SESSION['success_message'] = "IMPORTATION REUSSIE";
                            require("../view/importStudentFormView.php");
                            unset($_SESSION['success_message']);
                        }   }
                }
            }
        }
    }else{
        require("../view/unauthorizedAccessView.php");
    }


    // function to read Students JSON file
    function readStudentJsonFile($filePath){
        $json = file_get_contents($filePath);
        $parsedJsonStudent = json_decode($json)->{'student'};
        foreach( $parsedJsonStudent as $students){
            foreach($students as $student){
                $Student = retrieveStudentById($student->matricule);
                if(empty($Student)){
                    insertIntoStudent(htmlspecialchars($student->matricule),htmlspecialchars($student->nom),htmlspecialchars($student->prenoms),htmlspecialchars($student->dateNaissance),htmlspecialchars($student->lieu),htmlspecialchars($student->sexe),htmlspecialchars($student->photo),htmlspecialchars($student->codeCl),htmlspecialchars($student->CV ));
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
                insertIntoStudent(htmlspecialchars($student[0]),htmlspecialchars($student[1]),htmlspecialchars($student[2]),htmlspecialchars($student[3]),htmlspecialchars($student[4]),htmlspecialchars($student[5]),htmlspecialchars($student[6]),htmlspecialchars($student[7]),htmlspecialchars($student[8]));
            }
        }
    }


    