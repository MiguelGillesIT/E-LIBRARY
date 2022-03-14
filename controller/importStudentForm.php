<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        require("../view/ImportStudentFormView.php");
    }else{
        require("../view/unauthorizedAccessView.php");
    }
