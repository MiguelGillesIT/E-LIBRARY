<!DOCTYPE html>
<html>
<head>
    <title>EXPORT | BIBLIO</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../public/images/LOGO_BIBLIO.png" type="image/icon type">
    <link rel ="stylesheet" href = "../public/css/navbar.css">
    <link rel="stylesheet" href="../public/css/export.css">
</head>
<body>
<?php require('layout/navbar.php'); ?>
<div id = "container">
    <form action = "../controller/export.php" method ="post">
        <div class = "divInput">
            <h1>Exporter</h1>
        </div>
        <?php require('layout/message.php'); ?>
        <?php if(isset($_SESSION['fail_message'])) : ?>
            <div  class = "fail_message">
                <div>
                    <?= htmlspecialchars($_SESSION['fail_message'])?>
                </div>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['success_message'])) : ?>
            <div  class = "success_message">
                <div>
                    <?= htmlspecialchars($_SESSION['success_message']) ?>
                </div>
            </div>
        <?php endif; ?>
        <div class = "inputContainer divInput">
            <label for = "exportedFile"> Données </label><br>
            <select class = "inputField" id = "exportedFile" name = "ExportedFile">
                <option value="lends">EMPRUNTS</option>
                <option value="students">ÉTUDIANTS</option>
                <option value="classes">CLASSES</option>
                <option value="books">LIVRES</option>
            </select>
        </div>
        <div class = "inputContainer divInput">
            <label for = "fileType">type de fichier</label><br>
            <select class = "inputField" name="FileType" id="fileType">
                <option value="excel">EXCEL</option>
                <option value="csv">CSV</option>
                <option value="json">JSON</option>
            </select>
        </div>
        <div class = "divInput">
            <input type = "submit" value = "Importer"  class = "btn btn-hero-success">
        </div>

    </form>
</div>

</body>
</html>