$(function() {
    $( "#AnnonceDateLimite" ).datepicker();
});

$(document).ready(function(){
    $('#AnnonceType').on('change',function(){
        $('#AnnonceDemandeForm').submit();
    });
});