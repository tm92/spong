<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $playerOne = isset($_POST['playerOne'])?$_POST['playerOne']:'';
    $playerTwo = isset($_POST['playerTwo'])?$_POST['playerTwo']:'';

    $dbPlOne = $conn->real_escape_string($playerOne);
    $dbPlTwo = $conn->real_escape_string($playerTwo);
    
    $dbGQ = "SELECT * FROM games WHERE firstPlayer='" . $dbPlOne . "' AND secondPlayer='" . $dbPlTwo . "' OR firstPlayer='" . $dbPlTwo . "' AND secondPlayer='" . $dbPlOne . "' ORDER BY `ID` DESC";
    $countGames = "SELECT COUNT(winner) FROM games WHERE firstPlayer='" . $dbPlOne . "' AND secondPlayer='" . $dbPlTwo . "' OR firstPlayer='" . $dbPlTwo . "' AND secondPlayer='" . $dbPlOne . "'";
    $dbWinsF = "SELECT COUNT(winner) FROM games WHERE (firstPlayer='" . $dbPlOne . "' AND secondPlayer='" . $dbPlTwo . "' OR firstPlayer='" . $dbPlTwo . "' AND secondPlayer='" . $dbPlOne . "') AND winner='" . $playerOne . "'";
    $dbWinsS = "SELECT COUNT(winner) FROM games WHERE (firstPlayer='" . $dbPlOne . "' AND secondPlayer='" . $dbPlTwo . "' OR firstPlayer='" . $dbPlTwo . "' AND secondPlayer='" . $dbPlOne . "') AND winner='" . $playerTwo . "'";
    //ILOSC BRAMEK
    $goalsF = mysqli_query($conn, "SELECT SUM(firstResult) FROM games WHERE firstPlayer='" . $dbPlOne . "' AND secondPlayer='" . $dbPlTwo . "' OR firstPlayer='" . $dbPlTwo . "' AND secondPlayer='" . $dbPlOne . "'");
    $goalsF2 = mysqli_query($conn, "SELECT SUM(secondResult) FROM games WHERE secondPlayer='" . $dbPlOne . "' AND secondPlayer='" . $dbPlTwo . "' OR firstPlayer='" . $dbPlTwo . "' AND secondPlayer='" . $dbPlOne . "'");
    $goalsF3 = mysqli_fetch_array($goalsF);
    $goalsF4 = mysqli_fetch_array($goalsF2);
    $goalsF5 = $goalsF3[0] + $goalsF4[0];
    
    $goalsS = mysqli_query($conn, "SELECT SUM(firstResult) FROM games WHERE firstPlayer='" . $dbPlTwo . "' AND secondPlayer='" . $dbPlOne . "' OR firstPlayer='" . $dbPlOne . "' AND secondPlayer='" . $dbPlTwo . "'");
    $goalsS2 = mysqli_query($conn, "SELECT SUM(secondResult) FROM games WHERE secondPlayer='" . $dbPlTwo . "' AND secondPlayer='" . $dbPlOne . "' OR firstPlayer='" . $dbPlOne . "' AND secondPlayer='" . $dbPlTwo . "'");
    $goalsS3 = mysqli_fetch_array($goalsS);
    $goalsS4 = mysqli_fetch_array($goalsS2);
    $goalsS5 = $goalsS3[0] + $goalsS4[0];
    //ILOSC MECZOW
    $cGames = mysqli_query($conn, $countGames);
    $resGames = mysqli_fetch_array($cGames);
    //ILOSC ZWYCIESTW
    $wnsF = mysqli_query($conn, $dbWinsF);
    $wnsS = mysqli_query($conn, $dbWinsS);
    $games = mysqli_query($conn, $dbGQ); //POBIERZ WSZYSTKIE MECZE Z WYBRANYMI GRACZAMI
    $countWF = mysqli_fetch_array($wnsF); //ZWYCIESTWA 1. ZAWODNIK
    $countWS = mysqli_fetch_array($wnsS); //ZWYCIESTWA 2. ZAWODNIK
    
    echo '<h2>Statystyki</h2>';
    echo '<div class="col-md-4 col-md-offset-4">';
    echo '<table class="table" style="text-align:center;">';
    echo '<tr>';
    echo '<td>' . $countWF[0] . '</td>';
    echo '<td>Zwycięstw</td>';
    echo '<td>' . $countWS[0] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>' . round(($countWF[0]/$resGames[0])*100, 2) . '%</td>';
    echo '<td>% zwycięstw</td>';
    echo '<td>' . round(($countWS[0]/$resGames[0])*100, 2) . '%</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>' . $goalsF5 . '</td>';
    echo '<td>Zdobyte bramki</td>';
    echo '<td>' . $goalsS3[0] . '</td>';
    echo '</tr>';
    echo '</table>';
    echo '</div>';
    echo '<div class="row"></div>';
    echo '<h2>Mecze pomiędzy zawodnikami</h2>
            <div class="table-responsive">
            <table class="table">
            <tr>
            <th>Nr meczu</th>
            <th>1. gracz</th>
            <th>2. gracz</th>
            <th>Wynik</th>
            <th>Zwycięzca</th>';
    while($row = mysqli_fetch_array($games)){
            echo '<tr>';
            echo '<td>' . $row['ID'] . '</td>';
            echo '<td>' . $row['firstPlayer'] . '</td>';
            echo '<td>' . $row['secondPlayer'] . '</td>';
            echo '<td>' . $row['firstResult'] . '-' . $row['secondResult'] . '</td>';
            echo '<td>' . $row['winner'] . '</td>';
            echo '</tr>';
    }
          echo '</table>';
          echo '</div>';
} else {
    echo '';
}
?>