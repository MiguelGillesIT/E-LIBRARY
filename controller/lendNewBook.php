<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        require("../model/model.php");
        require("../view/lendBookView.php");
    }else{
        require("../view/unauthorizedAccessView.php");
    }