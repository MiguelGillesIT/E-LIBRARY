<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        require("../model/model.php");
        $classes = selectClasse();
        require("../view/studentsView.php");
    }else{
        require("../view/unauthorizedAccessView.php");
    }
