<?php
    $nameErr = '';
    $surnameErr = '';
    $shortErr = '';
    $nicknameErr = '';
    $message = '';
?>
      <div id="main" class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-12">
           <h1>Dodaj zawodnika</h1>
            <form role="form" id="add-player" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <span>Wszystkie pola muszą zostać uzupełnione.</span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Imię">
                    <span id="nameError" class="formError">Imię powinno składać się z minimum trzech znaków.</span>
                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Nazwisko">
                    <span id="surnameError" class="formError">Nazwisko powinno składać się z minimum trzech znaków.</span>
                    <input type="text" class="form-control" name="short" id="short" placeholder="Skrót">
                    <span id="shortError" class="formError">Skrót powinien zawierać dokładnie trzy znaki.</span>
                    <input type="text" class="form-control" name="nname" id="nname" placeholder="Pseudonim" autocomplete="off">
                    <span id="nickError" class="formError">Pseudonim powinien składać się z minimum trzech znaków.</span>
                    <input type="text" class="form-control" name="bbbb" id="bbbb" style="display: none;">
                    <input type="password" class="form-control" style="visibility: hidden;">
                    <input type="password" class="form-control" name="passPlayer" id="passPlayer" placeholder="Hasło" autocomplete="off">
                    <button onclick="addPlayerForm()" class="btn btn-success" id="sendPlayer">Dodaj zawodnika</button>
                    <br>
                    <span id="addPlayerMessage"></span>
            </form>
        </div>
    </div>
</div>
<?php
    $dbNm = isset($_POST['name'])?$_POST['name']:'';
    $dbSnm = isset($_POST['surname'])?$_POST['surname']:'';
    $dbSh = isset($_POST['short'])?$_POST['short']:'';
    $dbNick = isset($_POST['nname'])?$_POST['nname']:'';
    $dbPass = isset($_POST['passPlayer'])?$_POST['passPlayer']:'';

    $name = $conn->real_escape_string($dbNm);
    $surname = $conn->real_escape_string($dbSnm);
    $short = $conn->real_escape_string($dbSh);
    $nickname = $conn->real_escape_string($dbNick);
    $pass = $conn->real_escape_string($dbPass);

    if($pass=="piwnica"){
    if($name != '' && $surname != '' && $short != '' && $nickname !='' && strlen($name) >= 3 && strlen($surname) >= 3 &&
      strlen($short) == 3 && strlen($nickname) >= 3){
        if ($conn->query("INSERT into players (`player_name`, `player_surname`, `player_short`, `player_nick`) VALUES ('$name', '$surname', '$short', '$nickname')")) {
        echo '<script>alert("Dodano zawodnika."); window.location.href="addplayer.php";</script>';
        }
    } else {
        if(strlen($name) < 3){
            $nameErr = "Imię musi składać się z co najmniej trzech znaków.";
        } else if(strlen($surname) < 3){
            $surnameErr = "Nazwisko musi składać się z co najmniej trzech znaków.";
        } else if(strlen($short) != 3){
            $shortErr = "Skrót musi zawierać dokładnie trzy litery.";
        } else if(strlen($nickname) < 3){
            $nicknameErr = "Pseudonim musi zawierać co najmniej trzy znaki.";
        }
    }
    } else {
    
    }
?>