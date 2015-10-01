function addPlayerForm() {
    var name = document.getElementById("name").value;
    var surname = document.getElementById("surname").value;
    var short = document.getElementById("short").value;
    var nick = document.getElementById("nickname").value;
    
    if(name.length >=3 && surname.length >=3 && short.length === 3 && nick.length >= 3){
        document.getElementById("sendPlayer").setAttribute("type", "submit");
        document.getElementById("sendPlayer").setAttribute("name", "submit");
    }
    }
    
    /*
    if (name === '' || surname === '' || short === '' || nick === '') {
        document.getElementById("addPlayerError").innerHTML = "Nie wszystkie pola zostały uzupełnione";
    } else if(name.length >= 3 && surname.length >= 3 && short.length === 3 && nick.length >= 3)  {
        document.getElementById("addPlayerError").setAttribute("class", "hidden");
        document.getElementById("add-player").setAttribute("action", "actions/addplayer_form_send.php");
    }
    if(name.length < 3) {
        document.getElementById("nameError").innerHTML = "Imię musi składać się z minimum trzech znaków";
    } else {
        document.getElementById("nameError").setAttribute("class", "hidden");
    }
    if(surname.length < 3) {
        document.getElementById("surnameError").innerHTML = "Nazwisko musi składać się z minimum trzech znaków";
    } else {
        document.getElementById("surnameError").setAttribute("class", "hidden");
    }
    if(short.length !== 3){
        document.getElementById("shortError").innerHTML = "Skrót musi składać się z dokładnie trzech znaków";
    } else {
        document.getElementById("shortError").setAttribute("class", "hidden");
    }
    if(nick.length < 3){
        document.getElementById("nickError").innerHTML = "Pseudonim musi składać się z minimum trzech znaków";
    } else {
        document.getElementById("nickError").setAttribute("class", "hidden");
    }
    */
}