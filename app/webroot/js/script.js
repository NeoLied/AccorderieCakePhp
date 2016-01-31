$(function() {

    $( "#AnnonceDateLimite" ).datepicker(
        "option",
        $.datepicker.regional[ 'fr' ]
    );

});

$(document).ready(function(){
    $('#AnnonceType').change(function(){
        $('#AnnonceDemandeForm').submit();
    });
    $('#AnnonceType').change(function(){
        $('#AnnonceOffreForm').submit();
    });

    $('.ligneAnnonce').on('click',function(event){
        $(event.currentTarget).children().children('.lienAuteur').get(0).click();
        //alert('clic');
        console.log($(event.currentTarget).children().children('.lienAuteur'));
    });


});