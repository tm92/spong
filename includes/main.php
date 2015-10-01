<?php $champName = mysqli_query($conn, "SELECT player_name, player_surname FROM players WHERE player_champ=1");
      $imie = mysqli_fetch_array($champName);
?>
   <div id="main" class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Aktualny mistrz:</h1>
            <div id="champion" class="col-md-12">
                <img src="images/champion.jpg">
                
                <h3><?php echo $imie[0] . " " . $imie[1]; ?></h3>
            </div>
        </div>
    </div>
</div>