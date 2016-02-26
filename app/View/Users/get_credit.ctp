<table class="table table-hover" style="width: auto; margin: 0 auto;">
    <tr>
        <td>Votre offre de bienvenue : </td><td style="font-weight: bold;"><?php
            echo $offre_bienvenue;
            ?></td>
    </tr>
    <tr>
        <td>Temps que vous avez offert : </td><td style="font-weight: bold;"><?php
            echo $temps_offre;
            ?></td>
    </tr>
    <tr>
        <td>Temps que vous avez demandé: </td><td style="font-weight: bold;"><?php echo $temps_demande;
            ?></td>
    </tr>
    <tr class="info" style="font-weight: bold; font-size: larger;">
        <td>Votre crédit : </td><td><?php echo $temps_total; ?></td>
    </tr>

    <tr class="warning" style="font-weight: bold;">
        <td>Crédit temps maximum : </td><td><?php echo $limit; ?></td>
    </tr>
</table>