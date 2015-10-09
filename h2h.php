<?php include("includes/header.php");?>
<?php include("includes/db.php");?>
<?php include("includes/top.php");?>
<?php
    $query = "SELECT player_short FROM players";
    $result = mysqli_query($conn, $query);
    
    $queryNext = "SELECT player_short FROM players";
    $resultNext = mysqli_query($conn, $queryNext);

?>
<div id="main" class="container-fluid">
    <div class="row">
           <h1>Head 2 Head</h1>
    </div>
    <div class="row">
       <form role="form" id="add-match" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="col-md-4">
             <select class="btn btn-default dropdown-toggle" name="playerOne" id="playerOne" aria-labelledby="dropdownMenu1">
               <option value="">Wybierz zawodnika</option>
                <?php while($row = mysqli_fetch_array($result)){
                    echo "<option value='" . $row['player_short'] . "'>" . $row['player_short'] . "</option>";
                }
                ?>
              </select>
        </div>
        <div class="col-md-4"><h2>vs</h2></div>
        <div class="col-md-4">
               <select class="btn btn-default dropdown-toggle" name="playerTwo" id="playerTwo" aria-labelledby="dropdownMenu2">
               <option value="">Wybierz zawodnika</option>
                <?php while($rowN = mysqli_fetch_array($resultNext)){
                    echo "<option value='" . $rowN['player_short'] . "'>" . $rowN['player_short'] . "</option>";
                }
                ?>
              </select>
        </div>
        <div class="col-md-12">
        <button class="btn btn-success" id="sendResult">Porównaj</button>
        </div>
        </form>
    </div>
    <div class="col-md-12">
        <?php include("content/headstats.php");?>    
    </div>
</div>
<?php include("includes/bottom.php");?>