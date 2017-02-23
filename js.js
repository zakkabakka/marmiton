function getHtmlSelectOption(select){

   $.ajax({

      url: "/ajax/get_mesures_options",
      type: "GET"
    }).success(function(data) {
      select.html(data);
       $("#mesures0").material_select();
    });
}

function getHtmlSelectCatOption(select){

    $.ajax({

        url: "/ajax/get_categorie_options",
        type: "GET"
    }).success(function(data) {
        select.html(data);
        $("#categorie").material_select();
    });
}

$(document).ready(function() {

    $("#mesures0").material_select();
    $("select").material_select();

    getHtmlSelectOption($("#mesures0"));
    getHtmlSelectCatOption($("#categorie"));

});