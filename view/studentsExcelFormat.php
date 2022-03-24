<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=studentExcel.com.xls");

 ?>
 <br>
 <table style="width:100%" border='1'>
  <tr>
    <th>Matricule</th>
    <th>Nom</th>
    <th>Prénoms</th>
    <th>Date de naissance</th>
    <th>Lieu de naissance</th>
    <th>Sexe</th>
  </tr>
  <?php foreach( selectStudent() as $student ) : ?>
        <tr>
                <td><?= htmlspecialchars($student["matricule"]) ?></td>
                <td><?= htmlspecialchars($student["nom"]) ?></td>
                <td><?= htmlspecialchars($student["prenoms"]) ?></td>
                <td><?= htmlspecialchars($student["dateNaissance"]) ?></td>
                <td><?= htmlspecialchars($student["lieu"]) ?></td>
                <td><?= htmlspecialchars($student["sexe"]) ?></td>
        </tr>
  <?php  endforeach; ?>
</table>