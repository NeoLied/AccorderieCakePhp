<!-- Fichier : /app/View/Posts/view.ctp -->
<?php

    $demande = 1;

?>

<div class="table-responsive">
	<table class="table table-hover" style="text-align:center;">
		<thead>
		<tr>
			<th colspan="99"><legend><?php echo h($annonce['Annonce']['titre']); ?></legend></th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><label>Créée le : </label></td>
            <td><?php echo $annonce['Annonce']['date_post']; ?></td>
		</tr>
		<tr class="active">
            <td><label>Par : </label></td>
            <td><?php echo $annonce['User']['username']; ?></td>
		</tr>
		<tr>
            <td><label>Par : </label></td>
            <td><?php echo $annonce['User']['username']; ?></td>
		</tr>
		<tr class="active">
            <td><label>Description :</label></td>
            <td><?php echo $annonce['Annonce']['description']; ?></td>
		</tr>
		<tr>
            <td><label>Temps estimé : </label></td>
            <td><?php echo $annonce['Annonce']['temps_requis']; ?>H</td>
		</tr>
		<tr class="active">
            <td><label>Coordonnées de la personne :</label></td>
            <td><?php echo $annonce['User']['prenom']; ?> <?php echo $annonce['User']['nom']; ?></td>
		</tr>
		<tr>
            <td><label>Téléphone : </label></td>
            <td><?php echo $annonce['User']['telephone']; ?></td>
		</tr>
		<tr class="active">
            <td><label>Adresse mail : </label></td>
            <td><?php echo $annonce['User']['mail']; ?></td>
        </tr>
        <tr class="active">
            <td><label>Type : </label></td>
            <td><?php if($annonce['Annonce']['demande']) {
                    echo 'offre';
                    $demande = 0;
                }
                else {
                    echo 'demande';
                } ?></td>
        </tr>
		<tr class="info">
            <?php
            if($annonce['Annonce']['id_accepteur'] == 0)
            {
                echo "<div class='btn btn-default'>".$this->Form->postLink('Réserver cette annonce',array('class'=>'btn btn-default', 'action' => 'reservation', $annonce['Annonce']['id'],AuthComponent::user('id'),$annonce['Annonce']['user_id'],
                    $annonce['Annonce']['temps_requis'],$demande))."</div>";
            }
            else
            {
                ?> cette annonce a déjà une réservation <?php
            }
            ?>
		</tr>
		</tbody>
</div>
</table>
