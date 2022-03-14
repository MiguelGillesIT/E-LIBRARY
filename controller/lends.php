<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        require("../model/model.php");
        $lends = selectLentBook();
        require("../view/lendsView.php");
    }else{
        require("../view/unauthorizedAccessView.php");
    }