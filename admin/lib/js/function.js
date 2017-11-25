//Attendre que la page ait démarré
$(document).ready(function () {
    $("#carousel").carousel({
        interval: 1500,
        pause: false
    });
    $("#choix").hide();
    $("#id_genre").change(function(){
         //on releve l'attribut name de la balise select
        var parametre = $(this).attr('name');
        //on recupere la valeur du select
        var val = $(this).val();
        //récréer l'URL
        var refresh ='index.php?' + parametre + '=' + val +'&choix=1';
        window.location.href=refresh;
    });
 
});


