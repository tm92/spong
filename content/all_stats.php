<?php
    $games = mysqli_query($conn, "SELECT player_short, games FROM players ORDER BY games DESC");
    $wins = mysqli_query($conn, "SELECT player_short, wins, games FROM players ORDER BY wins DESC");
    $champ = mysqli_query($conn, "SELECT player_short, timesChamp FROM players ORDER BY timesChamp DESC"); 
    $goals = mysqli_query($conn, "SELECT player_short, goalsPlus FROM players ORDER BY goalsPlus DESC");
    $winstr = mysqli_query($conn, "SELECT player_short, winstreak FROM players ORDER BY winstreak DESC");
    $losestr = mysqli_query($conn, "SELECT player_short, losestreak FROM players ORDER BY losestreak DESC");
    $num = 1;
    $num2 = 1;
    $num3 = 1;
    $num4 = 1; 
    $num5 = 1;
    $num6 = 1;
?>
 <div id="main" class="container-fluid">
  <h1>Statystyki</h1>
  <br><br>
  <h2>Najwięcej spotkań</h2>
  <div class="row">
  <div class="table-responsive col-md-4 col-md-offset-4">         
  <table class="table">
    <thead>
      <tr>
        <th>Miejsce</th>
        <th>Gracz</th>
        <th>Liczba spotkań</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($games)){
        echo "<tr>";
        echo "<td>" . $num . "</td>";
        echo "<td>" . $row['player_short'] . "</td>";
        echo "<td>" . $row['games'] . "</td>";
        echo "</tr>";  
        $num++;
    }
    ?>
    </tbody>
  </table>
  </div>
  </div>
  <h2>Najwięcej zwycięstw</h2>
    <div class="row">
    <div class="table-responsive col-md-4 col-md-offset-4">         
  <table class="table">
    <thead>
      <tr>
        <th>Miejsce</th>
        <th>Gracz</th>
        <th>Zwycięstw</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($wins)){
        echo "<tr>";
        echo "<td>" . $num2 . "</td>";
        echo "<td>" . $row['player_short'] . "</td>";
        echo "<td>" . $row['wins'] . "</td>";
        echo "</tr>";  
        $num2++;
    }
    ?>
    </tbody>
  </table>
  </div>
  </div>
  <h2>Najwięcej razy zdobywał tytuł mistrza</h2>
  <div class="row">
  <div class="table-responsive col-md-4 col-md-offset-4">         
  <table class="table">
    <thead>
      <tr>
        <th>Miejsce</th>
        <th>Gracz</th>
        <th>Ile razy zdobyty tytuł</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($champ)){
        echo "<tr>";
        echo "<td>" . $num3 . "</td>";
        echo "<td>" . $row['player_short'] . "</td>";
        echo "<td>" . $row['timesChamp'] . "</td>";
        echo "</tr>";  
        $num3++;
    }
    ?>
    </tbody>
  </table>
  </div>
  </div>
    <h2>Najwięcej bramek</h2>
    <div class="row">
  <div class="table-responsive col-md-4 col-md-offset-4">         
  <table class="table">
    <thead>
      <tr>
        <th>Miejsce</th>
        <th>Gracz</th>
        <th>Liczba bramek</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($goals)){
        echo "<tr>";
        echo "<td>" . $num4 . "</td>";
        echo "<td>" . $row['player_short'] . "</td>";
        echo "<td>" . $row['goalsPlus'] . "</td>";
        echo "</tr>";  
        $num4++;
    }
    ?>
    </tbody>
  </table>
  </div>
     </div>
      <h2>Zwycięstw z rzędu</h2>
      <div class="row">
  <div class="table-responsive col-md-4 col-md-offset-4">         
  <table class="table">
    <thead>
      <tr>
        <th>Miejsce</th>
        <th>Gracz</th>
        <th>Zwycięstw z rzędu</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($winstr)){
        echo "<tr>";
        echo "<td>" . $num5 . "</td>";
        echo "<td>" . $row['player_short'] . "</td>";
        echo "<td>" . $row['winstreak'] . "</td>";
        echo "</tr>";  
        $num5++;
    }
    ?>
    </tbody>
  </table>
  </div>
    </div>
        <h2>Porażek z rzędu</h2>
        <div class="row">
  <div class="table-responsive col-md-4 col-md-offset-4">         
  <table class="table">
    <thead>
      <tr>
        <th>Miejsce</th>
        <th>Gracz</th>
        <th>Porażek z rzędu</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($losestr)){
        echo "<tr>";
        echo "<td>" . $num6 . "</td>";
        echo "<td>" . $row['player_short'] . "</td>";
        echo "<td>" . $row['losestreak'] . "</td>";
        echo "</tr>";  
        $num6++;
    }
    ?>
    </tbody>
  </table>
  </div>
  </div>
</div>
