<?php
    session_start();
    require("../model/model.php");
    insertIntoBiblioLogs($_SESSION['userID'],getUserIpAddr(),"DECONNEXION",date("Y/m/d"),date("h:i:sa"));
    //Deconnect user and destroy his session
    session_destroy();
    $cssPath = "../public/css/index.css";
    require("../index.php");
