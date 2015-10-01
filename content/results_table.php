<?php
    $gridQuery = "SELECT * FROM `games` ORDER BY `ID` DESC";
    $gridRes = mysqli_query($conn, $gridQuery);
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
    
    </tbody>
  </table>
  </div>
</div>
