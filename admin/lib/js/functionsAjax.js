$(document).ready(function () {
    $("td[id]").click(function () {
        var valeur1 = $.trim($(this).text());
        if (/Edge\/\d./i.test(navigator.userAgent)) {
            $(this).addClass("borderInput");
        }
        //2 lignes suivantes pour firefox
        $(this).contentEditable = "true";
        $(this).addClass("borderInput");
        var ident = $(this).attr("id");
        var name = $(this).attr("name");
        $(this).blur(function () {	
            $(this).removeClass("borderInput");
            var valeur2 = $(this).text();
            valeur2 = $.trim(valeur2);

            if (valeur1 != valeur2)
            {
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
                var retour = $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: "text",
                    url: "./lib/php/ajax/AjaxUpdateBouquin.php",
                    success: function (data) {
                        console.log("success");
                    }
                });
                retour.fail(function (jqXHR, textStatus, errorThrown) {
                    //alert("Echec retour: " + textStatus + "\nerrorThrown: " + errorThrown);
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            };
        });
    });
});


