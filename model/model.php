<?php


    function connectDb(){
        try{
            $db = new PDO('mysql:host=localhost;dbname=biblio;charset=utf8','root','',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $db;
        }catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

    function insertIntoClasse($codeCl,$libelleCl){
        $dataBase = connectDb();
        $sqlQueryInsertClass = "INSERT INTO classe(codeCl, libelleCl) VALUES ( :codeCl , :libelleCl)";
        $insertClass = $dataBase->prepare($sqlQueryInsertClass);
        $insertClass->execute([
            'codeCl' => $codeCl,
            'libelleCl' => $libelleCl,
        ]) or die(print_r($dataBase->errorInfo()));
    }


    function selectClasse(){
        $dataBase = connectDb();
        $sqlQuerySelectClass = "SELECT * FROM classe";
        $selectClass = $dataBase->prepare($sqlQuerySelectClass);
        $selectClass->execute();
        $classes = $selectClass->fetchAll();
        return $classes;
    }

    function retrieveIdClasseByLibelle($libelleCl){
        $dataBase = connectDb();
        $sqlQuerySelectClass = "SELECT codeCl FROM classe WHERE libelleCl =:libelleCl";
        $selectClass = $dataBase->prepare($sqlQuerySelectClass);
        $selectClass->execute([
            'libelleCl' => $libelleCl, 
        ]) or die(print_r($dataBase->errorInfo()));
        $classe = $selectClass->fetchAll();
        return $classe;
    }

    function retrieveClasse($codeCl,$libelleCl){
        $dataBase = connectDb();
        $sqlQuerySelectClass = "SELECT codeCl FROM classe WHERE codeCl = :codeCl OR libelleCl = :libelleCl";
        $selectClass = $dataBase->prepare($sqlQuerySelectClass);
        $selectClass->execute([
            'codeCl' => $codeCl,
            'libelleCl' => $libelleCl, 
        ]) or die(print_r($dataBase->errorInfo()));
        $classes = $selectClass->fetchAll();

        return $classes;
    }


    function retrieveClassById($codeCl){
        $dataBase = connectDb();
        $sqlQuerySelectClass = "SELECT codeCl FROM classe WHERE codeCl = :codeCl";
        $selectClass = $dataBase->prepare($sqlQuerySelectClass);
        $selectClass->execute([
            'codeCl' => $codeCl,
        ]) or die(print_r($dataBase->errorInfo()));
        $classes = $selectClass->fetchAll();

        return $classes;
    }

    function updateClasse($codeCl,$libelleCl){
        $dataBase = connectDb();
        $sqlQueryUpdateClass = "UPDATE classe SET libelleCl = :libelleCl WHERE codeCl = :codeCl";
        $insertUpdate = $dataBase->prepare($sqlQueryUpdateClass);
        $insertUpdate->execute([
            'codeCl' => $codeCl,
            'libelleCl' => $libelleCl,
        ]) or die(print_r($dataBase->errorInfo()));
    }

    function deleteClass($codeCl){
        $dataBase = connectDb();
        $sqlDeleteClass = "DELETE FROM classe WHERE codeCl = :codeCl";
        $deleteClass = $dataBase->prepare($sqlDeleteClass);
        $deleteClass ->execute([
            'codeCl' => $codeCl,
        ]) or die(print_r($dataBase->errorInfo()));
    }




    function insertIntoStudent($matricule,$nom,$prenoms,$dateNaissance,$lieu,$sexe,$photo,$codeCl,$CV){
        $dataBase = connectDb();
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

    function selectStudent(){
        $dataBase = connectDb();
        $sqlQuerySelectStudent= "SELECT * FROM etudiant";
        $selectStudent= $dataBase->prepare($sqlQuerySelectStudent);
        $selectStudent->execute();
        $students = $selectStudent->fetchAll();
        return $students;
    }

    function selectStudentByClassId($classId){
        $dataBase = connectDb();
        $sqlQuerySelectStudent = "SELECT * FROM etudiant WHERE codeCl = :codeCl ";
        $selectStudent = $dataBase->prepare($sqlQuerySelectStudent);
        $selectStudent->execute([
            "codeCl" => $classId,
        ]);
        $students = $selectStudent->fetchAll();
        return $students;
    }

    function retrieveStudentById($studentId){
        $dataBase = connectDb();
        $sqlQuerySelectStudent= "SELECT * FROM etudiant WHERE matricule =:matricule";
        $selectStudent= $dataBase->prepare($sqlQuerySelectStudent);
        $selectStudent->execute([
            "matricule" =>$studentId,
        ]);
        $students = $selectStudent->fetchAll();
        return $students;
    }

    function updateStudent($matricule,$nom,$prenoms,$dateNaissance,$lieu,$sexe,$photo,$CV){
        $dataBase = connectDb();
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

    function deleteStudent($studentId){
        $dataBase = connectDb();
        $sqlDeleteStudent = "DELETE FROM etudiant WHERE matricule = :matricule";
        $deleteStudent = $dataBase->prepare($sqlDeleteStudent);
        $deleteStudent->execute([
            'matricule' => $studentId,
        ]) or die(print_r($dataBase->errorInfo()));
    }




    function insertIntoBook($codeL,$titreL,$auteurL,$genreL){
        $dataBase = connectDb();
        $sqlQueryInsertBook = "INSERT INTO livre(codeL, titreL, auteurL, genreL) VALUES(:codeL, :titreL, :auteurL, :genreL)";
        $insertBook = $dataBase->prepare($sqlQueryInsertBook);
        $insertBook->execute([
            'codeL' => $codeL,
            'titreL' => $titreL,
            'auteurL' => $auteurL,
            'genreL' => $genreL,
            ]) or die(print_r($dataBase->errorInfo()));
        }

    function selectBook(){
        $dataBase = connectDb();
        $sqlQuerySelectBook = "SELECT * FROM livre";
        $selectBook = $dataBase->prepare($sqlQuerySelectBook);
        $selectBook->execute();
        $books = $selectBook->fetchAll();
        return $books;
    }

    function selectBookByAuthor($author){
        $dataBase = connectDb();
        $sqlQuerySelectBook = "SELECT * FROM livre WHERE auteurL = :auteurL";
        $selectBook = $dataBase->prepare($sqlQuerySelectBook);
        $selectBook->execute([
            "auteurL" => $author,
        ]);
        $books = $selectBook->fetchAll();
        return $books;
    }


    function selectBookAuthors(){
        $dataBase = connectDb();
        $sqlQuerySelectAuthors = "SELECT auteurL FROM livre";
        $selectAuthors = $dataBase->prepare($sqlQuerySelectAuthors);
        $selectAuthors->execute();
        $Authors = $selectAuthors->fetchAll();
        return $Authors;
    }

    function retrieveBookById($bookId){
        $dataBase = connectDb();
        $sqlQuerySelectBook = "SELECT * FROM livre WHERE codeL = :codeL";
        $selectBook = $dataBase->prepare($sqlQuerySelectBook);
        $selectBook->execute([
            "codeL" => $bookId,
        ])or die(print_r($dataBase->errorInfo()));
        $books = $selectBook->fetchAll();
        return $books;
    }

    function UpdateBook($codeL,$titreL,$auteurL,$genreL){
        $dataBase = connectDb();
        $sqlQueryUpdateBook = "UPDATE livre SET titreL = :titreL, auteurL = :auteurL, genreL =:auteurL WHERE codeL = :codeL";
        $UpdateBook = $dataBase->prepare($sqlQueryUpdateBook);
        $UpdateBook->execute([
            'codeL' => $codeL,
            'titreL' => $titreL,
            'auteurL' => $auteurL,
            'genreL' => $genreL,
        ]) or die(print_r($dataBase->errorInfo()));
    }

    function deleteBook($codeL){
        $dataBase = connectDb();
        $sqlDeleteBook = "DELETE FROM livre WHERE codeL = :codeL";
        $deleteBook = $dataBase->prepare($sqlDeleteBook);
        $deleteBook->execute([
            'codeL' => $codeL,
        ]) or die(print_r($dataBase->errorInfo()));
    }

    function lendBook($matricule,$codeL,$dateSortie){
        $dataBase = connectDb();
        $sqlLendBook = "INSERT INTO emprunter(matricule,codeL,dateSortie,dateRetour) VALUES(:matricule,:codeL,:dateSortie,NULL)";
        $lendBook = $dataBase->prepare($sqlLendBook);
        $lendBook->execute([
            'matricule' => $matricule,
            'codeL' => $codeL,
            'dateSortie' =>$dateSortie,
        ])or die(print_r($dataBase->errorInfo()));
    }

    function selectLentBook(){
        $dataBase = connectDb();
        $sqlQuerySelectLentBook = "SELECT * FROM emprunter";
        $selectLentBook = $dataBase->prepare($sqlQuerySelectLentBook);
        $selectLentBook->execute();
        $lentBooks = $selectLentBook->fetchAll();
        return $lentBooks;

    }

    function returnBook($matricule,$codeL,$dateRetour){
        $dataBase = connectDb();
        $sqlReturnBook = "UPDATE emprunter SET dateRetour = :dateRetour WHERE matricule = :matricule AND codeL = :codeL";
        $returnBook = $dataBase->prepare($sqlReturnBook);
        $returnBook->execute([
            'matricule' => $matricule,
            'codeL' => $codeL,
            'dateRetour' =>$dateRetour,
        ])or die(print_r($dataBase->errorInfo()));
    }

    function deleteLendBook($matricule,$codeL){
        $dataBase = connectDb();
        $sqlDeleteLendBook = "DELETE FROM emprunter WHERE matricule = :matricule AND codeL = :codeL";
        $deleteLendBook = $dataBase->prepare($sqlDeleteLendBook);
        $deleteLendBook->execute([
            'matricule' => $matricule,
            'codeL' => $codeL,
        ])or die(print_r($dataBase->errorInfo()));
    }

    //Function to search if user is in the database or not and connect him
    function retrieveUser($login){
        $dataBase = connectDb();
        $sqlQuerySelectUser = "SELECT * FROM userbiblio WHERE e_mail = :e_mail";
        $selectUser = $dataBase->prepare($sqlQuerySelectUser );
        $selectUser ->execute([
            'e_mail'=> $login,
        ])or die(print_r($dataBase->errorInfo()));

        return $users = $selectUser->fetchAll();

    }
        



