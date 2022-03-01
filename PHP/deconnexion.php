<?php
    session_start();
    session_destroy();
    header("Location: http://".$_SERVER['SERVER_ADDR']."/BIBLIO/index.php");
    exit();
?>