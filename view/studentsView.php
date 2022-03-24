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

        <?php foreach($classes as $classe) : ?>
            <div class="codeLibelleCl">
                <h2><?= htmlspecialchars($classe["codeCl"]) ?></h2>
                <h2><?= htmlspecialchars($classe["libelleCl"]) ?></h2>
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
                                    <td><?= htmlspecialchars($student["matricule"]) ?></td>
                                    <td><?= htmlspecialchars($student["nom"]) ?></td>
                                    <td><?= htmlspecialchars($student["prenoms"]) ?></td>
                                    <td><?= htmlspecialchars($student["dateNaissance"]) ?></td>
                                    <td><?= htmlspecialchars($student["lieu"]) ?></td>
                                    <td><?= htmlspecialchars($student["sexe"]) ?></td>
                                    <td><img src = "<?= htmlspecialchars($student["photo"]) ?>" alt="<?= htmlspecialchars($student["nom"])." ".htmlspecialchars($student["prenoms"])." photo's" ?>" width="100" height="100"></td>
                                    <td><a href = "<?= htmlspecialchars($student["CV"]) ?>"><?= htmlspecialchars($student["nom"])." ".htmlspecialchars($student["prenoms"])." CV's" ?></a></td>
                                    <td>
                                        <button>
                                            <a href = "updateDeleteStudent.php?action=delete&amp;studentId=<?= htmlspecialchars($student["matricule"])?>">Supprimer</a>
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
