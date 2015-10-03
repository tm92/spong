<?php $champName = mysqli_query($conn, "SELECT player_name, player_surname FROM players WHERE player_champ=1");
      $imie = mysqli_fetch_array($champName);
        $num = 1;
      $gridQuery = mysqli_query($conn, "SELECT player_name, player_surname, goalsPlus, goalsMinus, wins, loses, games, points FROM `players` ORDER BY `points` DESC");
?>
   <div id="main" class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Aktualny mistrz:</h1>
            <div id="champion" class="col-md-12">
                <img src="images/champion.jpg">
                
                <h3><?php echo $imie[0] . " " . $imie[1]; ?></h3>
            </div>
            <div class="col-md-12">
                <h1>Tabela wszech czasów</h1>
                <div class="table-responsive">         
  <table class="table">
    <thead>
      <tr>
        <th>Pozycja</th>
        <th>Imię i nazwisko</th>
        <th>Rozegrane Mecze</th>
        <th>Bilans Z-P</th>
        <th>Bilans bramek</th>
        <th>Różnica bramek</th>
        <th>Punkty</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($gridQuery)){
        echo "<tr>";
        echo "<td>" . $num . "</td>";
        echo "<td>" . $row['player_name'] . " " . $row['player_surname'] . "</td>";
        echo "<td>" . $row['games'] . "</td>";
        echo "<td>" . $row['wins'] . " - " . $row['loses'] . "</td>";
        echo "<td>" . $row['goalsPlus'] . " - " . $row['goalsMinus'] . "</td>";
        $math = $row['goalsPlus'] - $row['goalsMinus'];
        echo "<td>" . $math . "</td>";
        echo "<td>" . $row['points'] . "</td>";
        echo "</tr>";  
        $num++;
    }
    ?>
    </tbody>
  </table>
  </div>
            </div>
        </div>
    </div>
</div>