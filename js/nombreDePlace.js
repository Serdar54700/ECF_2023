function getPlaceDispo() {
    $.get('verifier_places_disponibles.php', function (data) {
        let monInput = document.getElementById("inputNumber");
        let affichageNombreDePlace = document.querySelector('.affichageNombreDePlace'); 
        affichageNombreDePlace.innerHTML = data; 
        monInput.max = data; 
     
    });
}

setInterval(getPlaceDispo, 2000);
