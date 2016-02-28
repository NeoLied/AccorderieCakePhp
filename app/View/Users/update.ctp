<?php
    if(isset($utilisateur) && $utilisateur != null){
        echo "<b>".$utilisateur."</b> Heures";
    }else{
        echo "Erreur <!-- Aucun parametres renseignes -->";
    }
exit();