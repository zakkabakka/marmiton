var WEBROOT = '/Users/zkherfi/Sites/EtnaSchool/lamech_h/marmiton/';



function getHtmlSelectOption(select){

   $.ajax({

      url: "/ajax/get_mesures_options",
      type: "GET"
    }).success(function(data) {
      select.html(data);
      //console.log(data);
       $("#mesures0").material_select();
    });
}

function getHtmlSelectCatOption(select){

    $.ajax({

        url: "/ajax/get_categorie_options",
        type: "GET"
    }).success(function(data) {
        select.html(data);
       // console.log(data);
        $("#categorie").material_select();
    });
}

$(document).ready(function() {

    //getHtmlSelectOption($("#mesures0"));
    // console.log($("#mesures0").prop("tagName"));
    $("#mesures0").material_select();
    $("select").material_select();

    getHtmlSelectOption($("#mesures0"));
    getHtmlSelectCatOption($("#categorie"));

});