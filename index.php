<?php
    require("model/model.php");
    
    $Books = selectBook();

    require("view/indexView.php");