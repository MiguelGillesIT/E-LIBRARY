<?php
    try{
        $db = new PDO('mysql:host=localhost;dbname=biblio;charset=utf8','root','',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }

    function insertIntoClasse($dataBase,$codeCl,$libelleCl){
        $sqlQueryInsertClass = "INSERT INTO classe(codeCl, libelleCl) VALUES ( :codeCl , :libelleCl)";
        $insertClass = $dataBase->prepare($sqlQueryInsertClass);
        $insertClass->execute([
            'codeCl' => $codeCl,
            'libelleCl' => $libelleCl,
        ]) or die(print_r($dataBase->errorInfo()));
    }

    function selectClasse($dataBase){
        $sqlQuerySelectClass = "SELECT * FROM classe";
        $selectClass = $dataBase->prepare($sqlQuerySelectClass);
        $selectClass->execute();
        $classes = $selectClass->fetchAll();

        foreach($classes as $classe){

                echo $classe['codeCl'].'----'.$classe['libelleCl'];

        }
    }

    function updateClasse($dataBase,$codeCl,$libelleCl){
        $sqlQueryUpdateClass = "UPDATE classe SET libelleCl = :libelleCl WHERE codeCl = :codeCl";
        $insertUpdate = $dataBase->prepare($sqlQueryUpdateClass);
        $insertUpdate->execute([
            'codeCl' => $codeCl,
            'libelleCl' => $libelleCl,
        ]) or die(print_r($dataBase->errorInfo()));
    }

    function deleteClasse($dataBase,$codeCl){
        $sqlDeleteClasse = "DELETE FROM classe WHERE codeCl = :codeCl";
        $deleteClasse = $dataBase->prepare($sqlDeleteClasse);
        $deleteClasse ->execute([
            'codeCl' => $codeCl,
        ]) or die(print_r($dataBase->errorInfo()));
    }




    function insertIntoStudent($dataBase,$matricule,$nom,$prenoms,$dateNaissance,$lieu,$sexe,$photo,$codeCl,$CV){
        $sqlQueryInsertStudent = "INSERT INTO etudiant(matricule, nom, prenoms, dateNaissance,lieu,sexe,CV,photo,codeCl) VALUES (:matricule, :nom, :prenoms, :dateNaissance, :lieu, :sexe, :CV, :photo, :codeCl)";
        $insertStudent = $dataBase->prepare($sqlQueryInsertStudent);
        $insertStudent->execute([
            'matricule' => $matricule,
            'nom' => $nom,
            'prenoms' => $prenoms,
            'dateNaissance' => $dateNaissance,
            'lieu' => $lieu,
            'sexe' => $sexe,
            'photo' => $photo,
            'codeCl' => $codeCl,
            'CV' => $CV,
        ]) or die(print_r($dataBase->errorInfo()));
    }

    function selectStudent($dataBase){
        $sqlQuerySelectStudent= "SELECT * FROM etudiant";
        $selectStudent= $dataBase->prepare($sqlQuerySelectStudent);
        $selectStudent->execute();
        $students = $selectStudent->fetchAll();

        foreach($students as $student){

            echo $student['matricule'].'----'.$student['nom'].'----'.$student['prenoms'].'----'.$student['dateNaissance'].'----'.$student['lieu'].'----'.$student['sexe'].'----'.$student['photo'].'----'.$student['codeCl'];

        }
    }

    function updateStudent($dataBase,$matricule,$nom,$prenoms,$dateNaissance,$lieu,$sexe,$photo,$CV){
        $sqlQueryUpdateStudent = "UPDATE etudiant SET  nom = :nom, prenoms =:prenoms, dateNaissance =:dateNaissance,lieu =:lieu,sexe =:sexe,photo =:photo,CV =:CV WHERE matricule = :matricule ";
        $updateStudent = $dataBase->prepare($sqlQueryUpdateStudent);
        $updateStudent->execute([
            'matricule' => $matricule,
            'nom' => $nom,
            'prenoms' => $prenoms,
            'dateNaissance' => $dateNaissance,
            'lieu' => $lieu,
            'sexe' => $sexe,
            'photo' => $photo,
            'CV' => $CV,
        ]) or die(print_r($dataBase->errorInfo()));
    }

    function deleteStudent($dataBase,$matricule){
        $sqlDeleteStudent = "DELETE FROM etudiant WHERE matricule = :matricule";
        $deleteStudent = $dataBase->prepare($sqlDeleteStudent);
        $deleteStudent ->execute([
            'matricule' => $matricule,
        ]) or die(print_r($dataBase->errorInfo()));
    }




    function insertIntoBook($dataBase,$codeL,$titreL,$auteurL,$genreL){
        $sqlQueryInsertBook = "INSERT INTO livre(codeL, titreL, auteurL, genreL) VALUES(:codeL, :titreL, :auteurL, :genreL)";
        $insertBook = $dataBase->prepare($sqlQueryInsertBook);
        $insertBook->execute([
            'codeL' => $codeL,
            'titreL' => $titreL,
            'auteurL' => $auteurL,
            'genreL' => $genreL,
            ]) or die(print_r($dataBase->errorInfo()));
        }

    function selectBook($dataBase){
        $sqlQuerySelectBook = "SELECT * FROM livre";
        $selectBook = $dataBase->prepare($sqlQuerySelectBook);
        $selectBook->execute();
        $books = $selectBook->fetchAll();

        foreach($books as $book){

            echo $book['codeL'].'----'.$book['titreL'].'----'.$book['auteurL'].'----'.$book['genreL'];

        }
    }

    function UpdateBook($dataBase,$codeL,$titreL,$auteurL,$genreL){
        $sqlQueryUpdateBook = "UPDATE livre SET titreL = :titreL, auteurL = :auteurL, genreL =:auteurL WHERE codeL = :codeL";
        $UpdateBook = $dataBase->prepare($sqlQueryUpdateBook);
        $UpdateBook->execute([
            'codeL' => $codeL,
            'titreL' => $titreL,
            'auteurL' => $auteurL,
            'genreL' => $genreL,
        ]) or die(print_r($dataBase->errorInfo()));
    }

    function deleteBook($dataBase,$codeL){
        $sqlDeleteBook = "DELETE FROM livre WHERE codeL = :codeL";
        $deleteBook = $dataBase->prepare($sqlDeleteBook);
        $deleteBook ->execute([
            'codeL' => $codeL,
        ]) or die(print_r($dataBase->errorInfo()));
    }





    function lendBook($dataBase,$matricule,$codeL,$dateSortie){
        $sqlLendBook = "INSERT INTO emprunter(matricule,codeL,dateSortie,dateRetour) VALUES(:matricule,:codeL,:dateSortie,NULL)";
        $lendBook = $dataBase->prepare($sqlLendBook);
        $lendBook->execute([
            'matricule' => $matricule,
            'codeL' => $codeL,
            'dateSortie' =>$dateSortie,
        ])or die(print_r($dataBase->errorInfo()));
    }

    function selectLentBook($dataBase){
        $sqlQuerySelectLentBook = "SELECT * FROM emprunter";
        $selectLentBook = $dataBase->prepare($sqlQuerySelectLentBook);
        $selectLentBook->execute();
        $lentBooks = $selectLentBook->fetchAll();

        foreach($lentBooks as $lentBook){

            echo $lentBook['matricule'].'----'.$lentBook['codeL'].'----'.$lentBook['dateSortie'].'----'.$lentBook['dateRetour'];

        }
    }

    function returnBook($dataBase,$matricule,$codeL,$dateRetour){
        $sqlReturnBook = "UPDATE emprunter SET dateRetour = :dateRetour WHERE matricule = :matricule AND codeL = :codeL";
        $returnBook = $dataBase->prepare($sqlReturnBook);
        $returnBook->execute([
            'matricule' => $matricule,
            'codeL' => $codeL,
            'dateRetour' =>$dateRetour,
        ])or die(print_r($dataBase->errorInfo()));
    }

    function deleteLendBook($dataBase,$matricule,$codeL){
        $sqlDeleteLendBook = "DELETE FROM emprunter WHERE matricule = :matricule AND codeL = :codeL";
        $deleteLendBook = $dataBase->prepare($sqlDeleteLendBook);
        $deleteLendBook->execute([
            'matricule' => $matricule,
            'codeL' => $codeL,
        ])or die(print_r($dataBase->errorInfo()));
    }

    function retrieveUser($dataBase,$login,$password){
        $sqlQuerySelectUser = "SELECT * FROM userbiblio WHERE e_mail = :e_mail";
        $selectUser = $dataBase->prepare($sqlQuerySelectUser );
        $selectUser ->execute([
            'e_mail'=> $login,
        ])or die(print_r($dataBase->errorInfo()));

        $users = $selectUser->fetchAll();

        if(!empty($users)){
            foreach ($users as $user){
                if($user['e_mail'] === $_POST['Login']){
                    if(hash_equals($user['password'] , crypt($password, $user['password']))){
                        $_SESSION['connected'] = true;
                        header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/student.php");
                        exit();
                    }else{
                        $_SESSION['message'] = "E-mail ou mot de passe incorrect";
                        header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/connexion.php");
                        exit();
                    }
                }else{
                    $_SESSION['message'] = "E-mail ou mot de passe incorrect";
                    header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/connexion.php");
                    exit();
                }
            }
        }else{
            $_SESSION['message'] = "E-mail ou mot de passe incorrect";
            header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/HTML/connexion.php");
            exit();
        }
    }
    
?>