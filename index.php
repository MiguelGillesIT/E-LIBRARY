<?php
    require("model/model.php");
    
    $Books = selectBook();
    $cssPath = "public/css/index.css";
    require("view/indexView.php");