<?php session_start();?>
<?php if(isset($_SESSION['connected']) && $_SESSION['connected']) :?>
    <!DOCTYPE html>
    <html lang = "en">
<head>
    <title>ÉTUDIANTS | BIBLIO</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../PICTURES/LOGO_BIBLIO.png" type="image/icon type">
    <link rel = "stylesheet" href = "../CSS/navbar.css">
    <link rel = "stylesheet" href = "../CSS/student.css">
</head>
<body>
    <?php include_once('layout/navbar.php'); ?>
    <div id = "container">
        <h2>ÉTUDIANTS</h2>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Date de naissance</th>
                    <th>Lieu de naissance</th>
                    <th>Sexe</th>
                    <th>Photo</th>
                    <th>Classe</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>
                        <div class = "actionBtn ModifyButton"></div>
                        <div class = "actionBtn deleteButton"></div>
                    </td>
                </tr>
                <tr>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                </tr>
                <tr>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                </tr>
                <tr>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                </tr>
                <tr>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                </tr>
                <tr>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                </tr>
                <tr>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                </tr>
                <tr>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                </tr>
                <tr>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                </tr>
                <tr>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                </tr>
                <tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php else : ?>
    <?php
        header("Location: http://localhost/BIBLIO/HTML/unauthorizedAccess.php");
        exit();
    ?>
<?php endif; ?>