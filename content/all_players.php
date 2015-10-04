<?php
    $player = mysqli_query($conn, "SELECT * FROM players");
?>
   <div id="main" class="container-fluid">
    <div class="row">
      <div class="col-md-12">
       <h1>Zawodnicy</h1>
        <?php while($row = mysqli_fetch_array($player)){
            echo '<div class="row"><h3>' . $row['player_name'] . ' ' . $row['player_surname'] . '</h3>';
            echo '<h4>"' . $row['player_nick'] . '"</h4></div>';
            echo '<div class="row">';
            echo '<div class="col-md-4 col-md-offset-4"><table class="table">';
            echo '<tr>
                    <td>Rozegrane mecze:</td>
                    <td>' . $row['games'] . '</td>
                  </tr>';
            echo '<tr>
                    <td>Ile razy zdobywał tytuł:</td>
                    <td>' . $row['timesChamp'] . '</td>
                  </tr>';
            echo '<tr>
                    <td>Zwycięstw:</td>
                    <td>' . $row['wins'] . '</td>
                  </tr>';
            echo '<tr>
                    <td>Porażek:</td>
                    <td>' . $row['loses'] . '</td>
                  </tr>';
             if($row['games'] > 0){
            $winpercent = ($row['wins']/$row['games'])*100;
            echo '<tr>
                    <td>% zwycięstw:</td>
                    <td>' . round($winpercent,2) . '%</td>
                  </tr>';
            }
            echo '<tr>
                    <td>Bramki zdobyte:</td>
                    <td>' . $row['goalsPlus'] . '</td>
                  </tr>';
            echo '<tr>
                    <td>Bramki stracone:</td>
                    <td>' . $row['goalsMinus'] . '</td>
                  </tr>';
            if($row['games'] > 0){
            $avgGP = $row['goalsPlus']/$row['games'];
            $avgGM = $row['goalsMinus']/$row['games'];
            echo '<tr>
                    <td>Średnio zdobytych bramek na mecz:</td>
                    <td>' . round($avgGP,2) . '</td>
                  </tr>';
            echo '<tr>
                    <td>Średnio straconych bramek na mecz:</td>
                    <td>' . round($avgGM,2) . '</td>
                  </tr>';
            }
            echo '<tr>
                    <td>Bramki zdobyte w 1. połowie:</td>
                    <td>' . $row['fhGP'] . '</td>
                  </tr>';
            echo '<tr>
                    <td>Bramki stracone w 1. połowie:</td>
                    <td>' . $row['fhGM'] . '</td>
                  </tr>';
            echo '<tr>
                    <td>Bramki zdobyte w 2. połowie:</td>
                    <td>' . $row['shGP'] . '</td>
                  </tr>';
            echo '<tr>
                    <td>Bramki stracone w 2. połowie:</td>
                    <td>' . $row['shGM'] . '</td>
                  </tr>';
            if($row['games'] > 0){
            $avgGPFH = $row['fhGP']/$row['games'];
            $avgGMFH = $row['fhGM']/$row['games'];
            $avgGPSH = $row['shGP']/$row['games'];
            $avgGMSH = $row['shGM']/$row['games'];
            echo '<tr>
                    <td>Średnio zdobytych bramek w 1. połowie:</td>
                    <td>' . round($avgGPFH,2) . '</td>
                  </tr>';
            echo '<tr>
                    <td>Średnio straconych bramek w 1. połowie:</td>
                    <td>' . round($avgGMFH,2) . '</td>
                  </tr>';
            echo '<tr>
                    <td>Średnio zdobytych bramek w 2. połowie:</td>
                    <td>' . round($avgGPSH,2) . '</td>
                  </tr>';
            echo '<tr>
                    <td>Średnio straconych bramek w 2. połowie:</td>
                    <td>' . round($avgGMSH,2) . '</td>
                  </tr>';
            }
            echo '</table></div></div>';
        }
        ?>
        
        </div>
    </div>
</div>