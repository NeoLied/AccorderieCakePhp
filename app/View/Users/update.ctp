<?php
//debug($utilisateur);
    if(isset($utilisateur)){
        echo "<b id='time'>".$utilisateur[0]['User']['credit_temps']."</b> Heures";
    }else{
        echo "Erreur <!-- Aucun parametres renseignes -->";
    }
exit();