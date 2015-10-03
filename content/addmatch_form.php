 <?php
    $query = "SELECT player_short FROM players";
    $result = mysqli_query($conn, $query);
    
    $queryNext = "SELECT player_short FROM players";
    $resultNext = mysqli_query($conn, $queryNext);

    $queryChamp = "SELECT player_short FROM players WHERE player_champ = 1";
    $whosChamp = mysqli_query($conn, $queryChamp);
    $res = mysqli_fetch_array($whosChamp);

    $playerOne = $playerOneRes = $playerOneHalf = $playerTwo = $playerTwoRes = $playerTwoHalf = '';
?>
   <div id="main" class="container-fluid">
    <div class="row">
           <h1>Dodaj wynik meczu</h1>
    </div>
    <div class="row">
       <form role="form" id="add-match" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="col-md-4">
             <select class="btn btn-default dropdown-toggle" name="playerOne" id="playerOne" aria-labelledby="dropdownMenu1">
                <?php while($row = mysqli_fetch_array($result)){
                    echo "<option value='" . $row['player_short'] . "'>" . $row['player_short'] . "</option>";
                }
                ?>
              </select>
              <br>
              <input type="number" min="0" id="firstPlayerResult" name="firstPlayerResult" class="form-control" placeholder="Liczba bramek">
              <input type="number" min="0" id="halfFirstPlayer" name="halfFirstPlayer" class="form-control" placeholder="Bramek do przerwy">   
        </div>
        <div class="col-md-4"><h2>vs</h2></div>
        <div class="col-md-4">
               <select class="btn btn-default dropdown-toggle" name="playerTwo" id="playerTwo" aria-labelledby="dropdownMenu2">
                <?php while($rowN = mysqli_fetch_array($resultNext)){
                    echo "<option value='" . $rowN['player_short'] . "'>" . $rowN['player_short'] . "</option>";
                }
                ?>
              </select>
              <br>
              <input type="number" min="0" name="secondPlayerResult" id="secondPlayerResult" class="form-control" placeholder="Liczba bramek">  
              <input type="number" min="0" name="halfSecondPlayer" id="halfSecondPlayer" class="form-control" placeholder="Bramek do przerwy">  
        </div>
        <button class="btn btn-success" id="sendResult">Dodaj wynik</button>
        </form>
    </div>
</div>
<?php

$playerOne = isset($_POST['playerOne'])?$_POST['playerOne']:'';
$firstPlayerRes = isset($_POST['firstPlayerResult'])?$_POST['firstPlayerResult']:'';
$firstPlayerHalf = isset($_POST['halfFirstPlayer'])?$_POST['halfFirstPlayer']:'';
$playerTwo = isset($_POST['playerTwo'])?$_POST['playerTwo']:'';
$secondPlayerRes = isset($_POST['secondPlayerResult'])?$_POST['secondPlayerResult']:'';
$secondPlayerHalf = isset($_POST['halfSecondPlayer'])?$_POST['halfSecondPlayer']:'';

$dbPlOne = $conn->real_escape_string($playerOne);
$dbFiRes = $conn->real_escape_string($firstPlayerRes);
$dbFiHa = $conn->real_escape_string($firstPlayerHalf);
$dbPlTwo = $conn->real_escape_string($playerTwo);
$dbSeRes = $conn->real_escape_string($secondPlayerRes);
$dbSeHa = $conn->real_escape_string($secondPlayerHalf);
if($firstPlayerRes > $secondPlayerRes){
    $dbWinner = $conn->real_escape_string($playerOne);
    $dbLooser = $conn->real_escape_string($playerTwo);
} else {
    $dbWinner = $conn->real_escape_string($playerTwo);
    $dbLooser = $conn->real_escape_string($playerOne);
}
$fResult = $firstPlayerRes - $firstPlayerHalf;
$dbFSH = $conn->real_escape_string($fResult);
$sResult = $secondPlayerRes - $secondPlayerHalf;
$dbSSH = $conn->real_escape_string($sResult);


    if($dbFiRes != '' && $dbFiHa != '' && $dbSeRes != '' && $dbSeHa != ''){
      if ($conn->query("INSERT INTO games(`firstPlayer`, `secondPlayer`, `firstResult`, `secondResult`, `firstResultH`, `secondResultH`, `winner`, `firstSecHa`, `secondSecHa`) VALUES ('$dbPlOne','$dbPlTwo','$dbFiRes','$dbSeRes','$dbFiHa','$dbSeHa','$dbWinner', '$dbFSH', '$dbSSH')")) {
     
          
    if($playerOne != $playerTwo){
    if($playerOne == $res[0] || $playerTwo == $res[0]){
        if($res[0]==$dbLooser){
            mysqli_query($conn, "UPDATE players SET player_champ=0 WHERE player_short='" . $dbLooser . "' ;");
            mysqli_query($conn, "UPDATE players SET player_champ=1 WHERE player_short='" . $dbWinner ."' ;");
            mysqli_query($conn, "UPDATE players SET timesChamp=timesChamp+1 WHERE player_short='" .$dbWinner . "' ;");
        }
    }
            mysqli_query($conn, "UPDATE players SET wins=wins+1 WHERE player_short='" .$dbWinner . "' ;");
            mysqli_query($conn, "UPDATE players SET loses=loses+1 WHERE player_short='" .$dbLooser . "' ;");
            mysqli_query($conn, "UPDATE players SET games=games+1 WHERE player_short='" . $dbWinner . "' ;");
            mysqli_query($conn, "UPDATE players SET games=games+1 WHERE player_short='" . $dbLooser . "' ;");
            mysqli_query($conn, "UPDATE players SET points=points+2 WHERE player_short='" . $dbWinner . "' ;");
            //winstreak & losestreak
            $wsQuery = "SELECT winner FROM games WHERE firstPlayer='" . $dbWinner . "' OR secondPlayer='" .$dbWinner . "' ORDER BY winner DESC LIMIT 1;";
            $lsQuery = "SELECT winner FROM games WHERE firstPlayer='" . $dbLooser . "' OR secondPlayer='" . $dbLooser . "' ORDER BY winner DESC LIMIT 1;";
        
        if(mysqli_fetch_array($wsQuery) == true){
            mysqli_query($conn, "UPDATE players SET winstreak=winstreak+1 WHERE player_short='" . $dbWinner . "';");
        } else {
            mysqli_query($conn, "UPDATE players SET winstreak=winstreak+1 WHERE player_short='" . $dbWinner . "';");
        }
        if(mysqli_fetch_array($lsQuery) == true){
            mysqli_query($conn, "UPDATE players SET losestreak=losestreak+1 WHERE player_short='" . $dbLooser . "';");
        } else {
            mysqli_query($conn, "UPDATE players SET losestreak=losestreak+1 WHERE player_short='" . $dbLooser . "';");
        }
            if($dbWinner == $playerOne){
                mysqli_query($conn, "UPDATE players SET goalsPlus=goalsPlus+" . $dbFiRes . ", goalsMinus=goalsMinus+" . $dbSeRes . " WHERE player_short='" . $dbWinner . "' ;");
                mysqli_query($conn, "UPDATE players SET goalsPlus=goalsPlus+" . $dbSeRes . ", goalsMinus=goalsMinus+" . $dbFiRes . " WHERE player_short='" . $dbLooser . "' ;");
            } else {
                mysqli_query($conn, "UPDATE players SET goalsPlus=goalsPlus+" . $dbSeRes . ", goalsMinus=goalsMinus+" . $dbFiRes . " WHERE player_short='" . $dbWinner . "' ;");
                mysqli_query($conn, "UPDATE players SET goalsPlus=goalsPlus+" . $dbFiRes . ", goalsMinus=goalsMinus+" . $dbSeRes . " WHERE player_short='" . $dbLooser . "' ;");
            }
          
    
        mysqli_query($conn, "UPDATE players SET losestreak=0 WHERE player_short='" . $dbWinner . "';");
        mysqli_query($conn, "UPDATE players SET winstreak=0 WHERE player_short='" . $dbLooser . "';");
      echo '<script>alert("Zapisano wynik."); window.location.href="addmatch.php"</script>';
      }  
    } else {
        echo '<script>alert("Coś poszło nie tak. Spróbuj jeszcze raz.");</script>';
    }
}
?>