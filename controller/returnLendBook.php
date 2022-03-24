<?php
    session_start();
    if(isset($_SESSION['connected']) && $_SESSION['connected']){
        require("../model/model.php");
        $Lends = SelectNotFinishedLend();
        require("../view/returnLendBookView.php");
    }else{
        require("../view/unauthorizedAccessView.php");
    }