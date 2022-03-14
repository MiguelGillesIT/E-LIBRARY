<?php
    session_start();
    //Deconnect user and destroy his session
    session_destroy();
    require("../index.php");
