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

function update(id, $path, $loadingImg) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && (xmlhttp.status == 200 || xmlhttp.status == 0)) {
            document.getElementById("time").innerHTML = xmlhttp.responseText;
        }else{
            if(document.getElementById("time").innerHTML == ""){
                document.getElementById("time").innerHTML = "<img src='"+$path+"img/"+$loadingImg+"' alt='' width='100%' height='100%' />";
            }
        }
    };
    xmlhttp.open("GET",$path+"users/update/"+id,true);
    xmlhttp.send();
}
