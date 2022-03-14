<!DOCTYPE html>
<html lang = "en">
<head>
    <title>LIVRES | BIBLIO</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../public/images/LOGO_BIBLIO.png" type="image/icon type">
    <link rel = "stylesheet" href = "../public/css/navbar.css">
    <link rel = "stylesheet" href = "../public/css/lends.css">
</head>
<body>
    <?php require('layout/navbar.php'); ?>
    <div id = "container">
            <h2>PRET DE LIVRES</h2>
            <div class="table-wrapper">
                <table class="fl-table">
                    <thead>
                        <tr>
                            <th>Etudiant</th>
                            <th>Livre</th>
                            <th>Date de Sortie</th>
                            <th>Date de Retour</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($lends)) :?>
                            <?php foreach( $lends as $lend ) :?>
                                <tr>
                                    <td><?= retrieveStudentById($lend["matricule"])[0]["matricule"] ?></td>
                                    <td><?= retrieveBookById($lend["codeL"])[0]["codeL"] ?></td>
                                    <td><?= $lend["dateSortie"] ?></td>
                                    <td><?= $lend["dateRetour"] ?></td>

                                </tr>
                            <?php  endforeach; ?>
                        <?php  endif; ?>
                    <tbody>
                </table>
            </div>
    </div>
</body>
</html>
