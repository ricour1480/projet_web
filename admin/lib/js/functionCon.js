$(document).ready(function () {

    $("#connexion").click(function () {
        var login = document.getElementById("#loginCo");
        var mp = document.getElementById("#mpCo");
        if (($.trim(login)!='' && $.trim(mp)!='')) {
            
        }
    });
    $("#bouton_deconnecter").click(function(){
        $("#bouton_deconnecter").val("Se Connecter");
    });
   
    $("# btn-deco-admin").click(function(){
        $("# btn-deco-admin").val("Administration");
    });
    
});


