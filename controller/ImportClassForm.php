<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']){
    require("../view/ImportClassFormView.php");
}else{
    require("../view/unauthorizedAccessView.php");
}
