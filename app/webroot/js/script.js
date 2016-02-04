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
        console.log($(event.currentTarget).children().children('.lienAuteur'));
    });


});