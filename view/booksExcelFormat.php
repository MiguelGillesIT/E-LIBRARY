<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=booksExcel.com.xls");

 ?>
 <br>
 <table style="width:100%" border='1'>
  <tr>
    <th>Code du livre</th>
    <th>Titre du livre</th>
    <th>Auteur du livre</th>
    <th>Genre du livre</th>
  </tr>
  <?php foreach( selectBook() as $book ) : ?>
        <tr>
                <td><?= htmlspecialchars($book["codeL"]) ?></td>
                <td><?= htmlspecialchars($book["titreL"]) ?></td>
                <td><?= htmlspecialchars($book["auteurL"]) ?></td>
                <td><?= htmlspecialchars($book["genreL"]) ?></td>
        </tr>
  <?php  endforeach; ?>
</table>