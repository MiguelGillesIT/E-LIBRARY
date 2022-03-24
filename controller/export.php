<?php
    session_start();
    //Verify if global variables of form have been created
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        if( !isset($_POST['ExportedFile']) || !isset($_POST['FileType'])){
            $_SESSION['fail_message'] = "CHAMP MANQUANT, VEUILLEZ LE REMPLIR";
            require("../view/ExportFormView.php");
            unset($_SESSION['fail_message']);

        }else{
            //Verify if global variables of form are empty
            if(empty($_POST['ExportedFile']) || empty($_POST['FileType'])){
                $_SESSION['fail_message'] = "CHAMP VIDE, VEUILLEZ LE REMPLIR";
                require("../view/ExportFormView.php");
                unset($_SESSION['fail_message']);

            }else{
                require("../model/model.php");
                $fileType = htmlspecialchars($_POST['FileType']);
                $exportedFile = htmlspecialchars($_POST['ExportedFile']);
                if($fileType == "excel"){
                    insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"EXPORTATION DES DONNEES",date("Y/m/d"),date("h:i:sa"));
                    if($exportedFile == "lends"){
                        require("../view/lendsExcelFormat.php");
                    }elseif($exportedFile == "students"){
                        require("../view/studentsExcelFormat.php");
                    }elseif($exportedFile == "classes"){
                        require("../view/classesExcelFormat.php");
                    }elseif($exportedFile == "books"){
                        require("../view/booksExcelFormat.php");
                    }
                }elseif($fileType == "csv"){
                    insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"EXPORTATION DES DONNEES",date("Y/m/d"),date("h:i:sa"));
                    if($exportedFile == "lends"){
                        exportLends(selectLentBook());
                    }elseif($exportedFile == "students"){
                        exportStudents(selectStudent());
                    }elseif($exportedFile == "classes"){
                        exportClasses(selectClasse());
                    }elseif($exportedFile == "books"){
                        exportBooks(selectBook());
                    }
                }else{
                    $_SESSION['fail_message'] = "FORMAT INCONNU";
                    require("../view/ExportFormView.php");
                    unset($_SESSION['fail_message']);
                }

            }
        }
    }else{
        require("../view/unauthorizedAccessView.php");
    }

    
function exportLends($data){
        $delimiter = ",";
        $filename = "liste_prets.csv";
    
        // Create a file pointer
        $f = fopen('php://memory', 'w');
    
        // Set column headers
        $fields = array('matricule', 'codeL', 'date de sortie', 'date de retour');
        fputcsv($f, $fields, $delimiter);
    
        // Output each row of the data, format line as csv and write to file pointer
        foreach($data as $row){
             $lineData = array($row['matricule'], $row['codeL'],$row['dateSortie'],$row['dateRetour']);
             fputcsv($f, $lineData, $delimiter);
        }
    
        // Move back to beginning of file
        fseek($f, 0);
    
        // Set headers to download file rather than displayed
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');
    
        //output all remaining data on a file pointer
        fpassthru($f);
}

function exportStudents($data){
    $delimiter = ",";
    $filename = "liste_eleves.csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('matricule', 'nom', 'prenoms', 'date de naissance','lieu de naissance','sexe','code de classe');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    foreach($data as $row){
         $lineData = array($row['matricule'], $row['nom'],$row['prenoms'],$row['dateNaissance'],$row['lieu'],$row['sexe'],$row['codeCl']);
         fputcsv($f, $lineData, $delimiter);
    }

    // Move back to beginning of file
    fseek($f, 0);

    // Set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}

function exportClasses($data){
    $delimiter = ",";
    $filename = "liste_Classe.csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('Code de classe', 'Libellé de classe');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    foreach($data as $row){
         $lineData = array($row['codeCl'], $row['libelleCl']);
         fputcsv($f, $lineData, $delimiter);
    }

    // Move back to beginning of file
    fseek($f, 0);

    // Set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}

function exportBooks($data){
    $delimiter = ",";
    $filename = "liste_livres.csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('Code Livre', 'Titre Livre', 'Auteur Livre', 'Genre Livre');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    foreach($data as $row){
         $lineData = array($row['codeL'], $row['titreL'],$row['auteurL'],$row['genreL']);
         fputcsv($f, $lineData, $delimiter);
    }

    // Move back to beginning of file
    fseek($f, 0);

    // Set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}

