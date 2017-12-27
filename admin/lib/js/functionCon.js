$(document).ready(function () {

    $("#connexion").click(function () {
        var login = document.getElementById("#loginCo");
        var mp = document.getElementById("#mpCo");
        if (($.trim(login) != '' && $.trim(mp) != '')) {

        }
    });
    $("#bouton_deconnecter").click(function () {
        $("#bouton_deconnecter").val("Se Connecter");
        $("#menu_admin").hide();
    });

    $("#btn-deco-admin").click(function () {
        $("#btn-deco-admin").val("Administration");
    });
    $("#choix_client").hide();
    $("#id_client").change(function () {
        //on releve l'attribut name de la balise select
        var parametre = $(this).attr('name');
        //on recupere la valeur du select
        var val = $(this).val();
        //récréer l'URL
        var refresh = 'index.php?' + parametre + '=' + val + '&choix_client=2';
        window.location.href = refresh;
    });
    $("#choix_comm").click(function () {
        var parametre = $(this).attr('name');
        //on recupere la valeur du select
        var val = $(this).val();
        //récréer l'URL
        var refresh = 'index.php?' + parametre + '=' + val + '&choix_client=2';
        window.location.href = refresh;
    })
});


