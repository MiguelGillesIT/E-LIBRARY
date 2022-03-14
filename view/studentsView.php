 <!DOCTYPE html>
    <html lang = "en">
<head>
    <title>ÉTUDIANTS | BIBLIO</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../public/images/LOGO_BIBLIO.png" type="image/icon type">
    <link rel = "stylesheet" href = "../public/css/navbar.css">
    <link rel = "stylesheet" href = "../public/css/students.css">
</head>
<body>
    <?php require('layout/navbar.php'); ?>
    <div id = "container">

        <?php if(isset($_SESSION['fail_message'])) : ?>
            <div  class = "fail_message">
                <div>
                    <?=$_SESSION['fail_message']?>
                </div>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['success_message'])) : ?>
            <div  class = "success_message">
                <div>
                    <?= $_SESSION['success_message'] ?>
                </div>
            </div>
        <?php endif; ?>

        <?php foreach($classes as $classe) : ?>
            <div class="codeLibelleCl">
                <h2><?= $classe["codeCl"] ?></h2>
                <h2><?= $classe["libelleCl"] ?></h2>
            </div>
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
                                <th>CV</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( selectStudentByClassId($classe["codeCl"]) as $student ) : ?>
                                <tr>
                                    <td><?= $student["matricule"] ?></td>
                                    <td><?= $student["nom"] ?></td>
                                    <td><?= $student["prenoms"] ?></td>
                                    <td><?= $student["dateNaissance"] ?></td>
                                    <td><?= $student["lieu"] ?></td>
                                    <td><?= $student["sexe"] ?></td>
                                    <td><img src = "<?= $student["photo"] ?>" alt="<?= $student["nom"]." ".$student["prenoms"]." photo's" ?>" width="100" height="100"></td>
                                    <td><a href = "<?= $student["CV"]?>"><?= $student["nom"]." ".$student["prenoms"]." CV's" ?></a></td>
                                    <td>
                                        <button>
                                            <a href = "#">Modifier</a>
                                        </button>
                                        <button>
                                            <a href = "updateDeleteStudent.php?action=delete&amp;studentId=<?=$student["matricule"]?>">Supprimer</a>
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
