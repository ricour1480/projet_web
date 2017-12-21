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
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Format non valide.");
    $('#formulaire').validate({
        rules: {
            email: "required",
            verifemail: {
                equalTo: "#email"                
            },
            name: "required",
            firstname: "required",
            mp:"required",
            login:"required",
            gsm: {
                required: true,
                regex: /^(0)[0-9]{2,3}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/
            },
            adr: "required",
            ville: "required",
            codepostale: {
                required: true,
                min: 1000,
                max: 9999
            },
            submitHandler: function (form) {
                form.submit();
            }
        }
    });
    //TRADUCTION DES MESSAGES DE VALIDATION EN FRANÇAIS
    $.extend($.validator.messages, {
        required: "Veuillez renseigner ce champ.",
        email: "Veuillez renseigner un email valide.",
        url: "Url non conforme.",
        date: "Date non valide.",
        number: "Veuillez n'entrer que des chiffres.",
        digits: "Veuillez n'entrer que des chiffres.",
        equalTo: "Les champs ne concordent pas.",
        maxlength: $.validator.format("Entrez au maximum {0} caract&egrave;res."),
        minlength: $.validator.format("Entrez au minimum {0} caract&egrave;res."),
        rangelength: $.validator.format("Votre entrée doit compter entre {0} et {1} caract&egrave;res."),
        range: $.validator.format("Entrez un nombre entre {0} et {1}."),
        max: $.validator.format("Entrez un nombre inférieur ou égal à {0}."),
        min: $.validator.format("Entrz un nombre de minimum {0}."),
        regex: "Format non conforme"
    });
  
});


