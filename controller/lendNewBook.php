<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        require("../model/model.php");
        $students = selectStudent();
        $books = selectBook();
        require("../view/lendBookView.php");
    }else{
        require("../view/unauthorizedAccessView.php");
    }