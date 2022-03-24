<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=lendsExcel.com.xls");

 ?>
 <br>
 <table style="width:100%" border='1'>
  <tr>
    <th>Etudiant</th>
    <th>Livre</th>
    <th>Date de Sortie</th>
    <th>Date de Retour</th>
  </tr>
  <?php foreach( selectLentBook() as $lends ) : ?>
        <tr>
                <td><?= htmlspecialchars($lends["matricule"]) ?></td>
                <td><?= htmlspecialchars($lends["codeL"]) ?></td>
                <td><?= htmlspecialchars($lends["dateSortie"]) ?></td>
                <td><?= htmlspecialchars($lends["dateRetour"]) ?></td>
        </tr>
  <?php  endforeach; ?>
</table>