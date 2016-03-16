<?php
    if(isset($utilisateur)){
        echo "<b>".$utilisateur."</b> Heures";
    }else{
        echo "Erreur <!-- Aucun parametres renseignes -->";
    }
exit();