$(function() {
    $( "#AnnonceDateLimite" ).datepicker();
});

$(document).ready(function(){
    $('#AnnonceType').change(function(){
        $('#AnnonceDemandeForm').submit();
    });
    $('#AnnonceType').change(function(){
        $('#AnnonceOffreForm').submit();
    });
});