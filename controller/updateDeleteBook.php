<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        require("../model/model.php");
        if(!isset($_GET["action"]) || !isset($_GET["bookId"])){
            $_SESSION['fail_message'] = "CHAMP MANQUANT";
            $authors = selectBookAuthors();
            require("../view/booksView.php");
            unset($_SESSION['fail_message']);

        }else{
            if(empty($_GET["action"]) ||  empty($_GET["bookId"])){
                $_SESSION['fail_message'] = "CHAMP VIDE";
                $authors = selectBookAuthors();
                require("../view/booksView.php");
                unset($_SESSION['fail_message']);


            }else{
                $action = htmlspecialchars($_GET["action"]);
                if($action === "delete"){
                    $bookId = htmlspecialchars($_GET["bookId"]);
                    deleteBook($bookId);
                    $authors = selectBookAuthors();
                    $_SESSION['success_message'] = "SUPPRESSION REUSSIE";
                    require("../view/booksView.php");
                    unset($_SESSION['success_message']);

                }elseif($action === "update"){
                    $authors = selectBookAuthors();
                    $_SESSION['success_message'] = "MODIFICATION REUSSIE";
                    require("../view/booksView.php");
                    unset($_SESSION['success_message']);
                }
            }
        }
    }else{
        require("../view/unauthorizedAccessView.php");
    }
