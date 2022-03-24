<!DOCTYPE html>
<html>
<head>
    <title>IMPORTATION | BIBLIO</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../public/images/LOGO_BIBLIO.png" type="image/icon type">
    <link rel ="stylesheet" href = "../public/css/navbar.css">
    <link rel="stylesheet" href="../public/css/import.css">
</head>
<body>
<?php require('layout/navbar.php'); ?>
<div id = "container">
    <form action = "../controller/importBook.php" method ="post" enctype="multipart/form-data">
        <div class = "divInput">
            <h1>Importer la liste des livres</h1>
        </div>
        <?php require('layout/message.php'); ?>
        <?php if(isset($_SESSION['fail_message'])) : ?>
            <div  class = "fail_message">
                <div>
                    <?= htmlspecialchars($_SESSION['fail_message'])?>
                    <?php unset($_SESSION['fail_message']);?>
                </div>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['success_message'])) : ?>
            <div  class = "success_message">
                <div>
                    <?= htmlspecialchars($_SESSION['success_message']) ?>
                    <?php  unset($_SESSION['success_message']);?>
                </div>
            </div>
        <?php endif; ?>
        <div class = "inputContainer divInput">
            <label for = "importedFile"> fichier</label><br>
            <input type = "file" class = "inputField" id = "importedFile" name = "ImportedFile" accept = ".cvs, .xlsx, .json"><br>
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