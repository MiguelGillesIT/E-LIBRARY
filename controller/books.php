<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        require("../model/model.php");
        $authors = selectBookAuthors();
        require("../view/booksView.php");
    }else{
        require("../view/unauthorizedAccessView.php");
    }