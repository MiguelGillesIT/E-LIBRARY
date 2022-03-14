<!DOCTYPE html>
<html lang = "en">
<head>
    <title>LIVRES | BIBLIO</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../public/images/LOGO_BIBLIO.png" type="image/icon type">
    <link rel = "stylesheet" href = "../public/css/navbar.css">
    <link rel = "stylesheet" href = "../public/css/books.css">
</head>
<body>
<?php require('layout/navbar.php'); ?>
<div id = "container">
    <?php if(isset($_SESSION['fail_message'])) : ?>
        <div  class = "fail_message">
            <div>
                <?=$_SESSION['fail_message']?>
                <?php unset($_SESSION['fail_message']);?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['success_message'])) : ?>
        <div  class = "success_message">
            <div>
                <?= $_SESSION['success_message'] ?>
                <?php unset($_SESSION['success_message']);?>
            </div>
        </div>
    <?php endif; ?>
    <?php foreach($authors as $author) : ?>
        <h2><?= $author["auteurL"] ?></h2>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Titre</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach( selectBookByAuthor($author["auteurL"]) as $book ) : ?>
                    <tr>
                        <td><?= $book["codeL"] ?></td>
                        <td><?= $book["titreL"] ?></td>
                        <td><?= $book["genreL"] ?></td>
                        <td>
                            <button>
                                <a href = "#">Modifier</a>
                            </button>
                            <button>
                                <a href = "updateDeleteBook.php?action=delete&amp;bookId=<?=$book["codeL"] ?>">Supprimer</a>
                            </button>
                        </td>
                    </tr>
                <?php  endforeach; ?>
                <tbody>
            </table>
        </div>
    <?php  endforeach; ?>
</div>
</body>
</html>
