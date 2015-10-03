<?php
    $gridQuery = mysqli_query($conn, "SELECT ID, firstPlayer, secondPlayer, firstResult, secondResult, firstResultH, secondResultH, firstSecHa, secondSecHa, winner  FROM `games` ORDER BY `ID` DESC");
    //$gridRes = mysqli_query($conn, $gridQuery);
?>
 
 <div id="main" class="container-fluid">
  <h1>Wyniki spotkań</h1>
  <div class="table-responsive">         
  <table class="table">
    <thead>
      <tr>
        <th>Nr meczu</th>
        <th>1. gracz</th>
        <th>2. gracz</th>
        <th>Wynik końcowy</th>
        <th>Wynik do przerwy</th>
        <th>Wynik - 2. połowa</th>
        <th>Zwycięzca</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($gridQuery)){
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['firstPlayer'] . "</td>";
        echo "<td>" . $row['secondPlayer'] . "</td>";
        echo "<td>" . $row['firstResult'] . "-" . $row['secondResult'] . "</td>";
        echo "<td>" . $row['firstResultH'] . "-" . $row['secondResultH'] . "</td>";
        echo "<td>" . $row['firstSecHa'] . "-" . $row['secondSecHa'] . "</td>";
        echo "<td>" . $row['winner'] . "</td>";
        echo "</tr>";  
    }
    ?>
    </tbody>
  </table>
  </div>
</div>
