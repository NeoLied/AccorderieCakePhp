$(function() {

    $( "#datepicker" ).datepicker({
        minDate :0,
        dateFormat :"yy-mm-dd",
        regional :"fr"
    });

});

$(document).ready(function(){
    $('#AnnonceTypeId').change(function(){
        $('#AnnonceDemandeForm').submit();
    });
    $('#AnnonceTypeId').change(function(){
        $('#AnnonceOffreForm').submit();
    });

    $('.ligneAnnonce').on('click',function(event){
        $(event.currentTarget).children().children('.lienAuteur').get(0).click();
        //alert('clic');
        //console.log($(event.currentTarget).children().children('.lienAuteur'));
    });

    $('.ligneAnnonce').hover(function(event){
      $('.ligneAnnonce *').css('cursor','pointer');
    });


});

function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;
}

function update(id, $path, $loadingImg) {

    xmlhttp = getXMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && (xmlhttp.status == 200 || xmlhttp.status == 0)) {
            document.getElementById("time").innerHTML = xmlhttp.responseText;
        }else{
            if(document.getElementById("time").innerHTML == ""){
                document.getElementById("time").innerHTML = "<img src='"+$path+"img/"+$loadingImg+"' alt='Chargement' width='100%' height='100%' />";
            }
        }
    };
    xmlhttp.open("GET",$path+"users/update/"+id,true);
    xmlhttp.send();
}

function homePage(id, $path, $loadingImg) {

    xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("dynamic").innerHTML = xhr.responseText;
        }else{
            alert
            if(document.getElementById("dynamic").innerHTML == ""){
                document.getElementById("dynamic").innerHTML = "<img src='"+$path+"img/"+$loadingImg+"' alt='Chargement' />";
            }
        }
    };
    xhr.open("GET",$path+"users/dynamic/"+id,true);
    xhr.send();
}
/*
function updatePrefs($id, $path, $param1, $param2) {

    $.ajax({
        url: $path+"users/prefs/"+$id+"/"+$param1+"/"+$param2,
        type: "POST",
        async: true,
        data: { lastPost:$param1, favoriteType:$param2},
        dataType: "html",

        success: function(data) {
            $('#output').html(data);
            drawVisualization();
        },
    });
}*/
