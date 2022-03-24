<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=classesExcel.com.xls");

 ?>
 <br>
 <table style="width:100%" border='1'>
  <tr>
    <th>Code de la classe</th>
    <th>Libellé de la classe</th>
  </tr>
  <?php foreach( selectClasse() as $classe ) : ?>
        <tr>
                <td><?= htmlspecialchars($classe["codeCl"]) ?></td>
                <td><?= htmlspecialchars($classe["libelleCl"]) ?></td>
        </tr>
  <?php  endforeach; ?>
</table>