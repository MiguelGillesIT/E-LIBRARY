<?php 

    // function to read Students JSON file
    function readJsonFile($filePath){
        $json = file_get_contents($filePath);
        $parsedJsonStudent = json_decode($json)->{'student'};
        foreach( $parsedJsonStudent as $students){
            foreach($students as $student){
                echo "Matricule : ". $student->matricule ." Nom : ". $student->nom ." Prénoms : ". $student->prenoms ." date de naissance : ". $student->dateNaissance ." lieu : ". $student->lieu ." sexe : ". $student->sexe ." photo :". $student->photo." \n ";
            } 
        }
    }

    // function to read Students Excel file
    function readXlsFile($filePath){

    }

    //function to read Students CVS file 
    function readCvsFile($filePath){
        //Open the file.
        $loadedFile = fopen($filePath, "r");
        //Loop through the CSV rows.
        while (($student = fgetcsv($loadedFile, 0, ",")) !== FALSE) {
            echo "Matricule : ". $student[0] ." Nom : ". $student[1] ." Prénoms : ". $student[2] ." date de naissance : ". $student[3] ." lieu : ". $student[4] ." sexe : ". $student[5] ." photo :". $student[6]." \n ";
            }
    }
    
    readCvsFile($_FILES['ImportedFile']['tmp_name']);
    
    

?>