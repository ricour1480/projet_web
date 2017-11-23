//Attendre que la page ait démarré
$(document).ready(function () {
    $("#carousel").carousel({
        interval: 1500,
        pause: false
    });

    // On cache la zone de texte
    $('#menuHamburger').hide();
// toggle() lorsque le lien avec l'ID #toggler est cliqué
    $('a#hamburger').click(function ()
    {
        $('#menuHamburger').toggle(400);
        return false;
    });

});


