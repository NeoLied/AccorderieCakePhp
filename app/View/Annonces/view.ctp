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
		<tr class="active">
			<td><label>Créée le : </label></td>
            <td><?php echo date("d / m / Y", strtotime($annonce['Annonce']['date_post'])); ?></td>
		</tr>
		<tr>
            <td><label>Par : </label></td>
            <td><?php echo "<a href='". $this->Html->url('/users/view/'. $annonce['Annonce']['user_id'], true) ."'>". $annonce['User']['username'] ."</a>"; ?></td>
		</tr>
		<tr class="active">
            <td><label>Description :</label></td>
            <td><?php echo $annonce['Annonce']['description']; ?></td>
		</tr>
		<tr>
            <td><label>Temps estimé : </label></td>
            <td><?php echo $annonce['Annonce']['temps_requis']; ?> Heures</td>
		</tr>
        <?php if( (AuthComponent::user('role') == "admin") || ($annonce['Annonce']['id_accepteur'] == AuthComponent::user('id')) ){ ?>
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
        <?php } ?>
                <tr class="active">
            <td><label>Type : </label></td>
            <td><?php echo $annonce['Type']['libelle']; ?></td>
        </tr>
        <tr>
            <td><label>Nature de l'annonce : </label></td>
            <td><?php if($annonce['Annonce']['demande']) {
                    echo 'OFFRE';
                    $demande = 0;
                }
                else {
                    echo 'DEMANDE';
                } ?></td>
        </tr>
		<tr class="info">
            <?php

            if(!$annonce['Annonce']['archive']){
                // Affichage du bouton supprimer pour les administrateurs et pour l'auteur de l'annonce
                if($annonce['User']['id'] == AuthComponent::user('id') || AuthComponent::user('role') == 'admin') {
                    echo "<div class='btn btn-default'>".$this->Form->postLink('Supprimer cette annonce',array('class'=>'btn btn-default', 'action' => 'delete', $annonce['Annonce']['id']))."</div>";
                }

                if($annonce['Annonce']['id_accepteur'] == 0) {
                    if(AuthComponent::user('role') == "admin" && ($annonce['Annonce']['annonceValide'] == "non")){
                        echo "<div class='btn btn-default'>".$this->Form->postLink('Valider cette annonce',array('class'=>'btn btn-default', 'action' => 'valider_service', $annonce['Annonce']['id'],AuthComponent::user('id'),$annonce['Annonce']['user_id'],$demande))."</div>";
                    }
                    if(AuthComponent::user('id') != $annonce['Annonce']['user_id'])
                        echo "<div class='btn btn-default'>".$this->Form->postLink('Réserver cette annonce',array('class'=>'btn btn-default', 'action' => 'reservation', $annonce['Annonce']['id'],AuthComponent::user('id'),$annonce['Annonce']['user_id'],
                                $annonce['Annonce']['temps_requis'],$demande))."</div>";
                }else {
                    if($annonce['Annonce']['id_accepteur'] == AuthComponent::user('id')){

                        echo "<div class='btn btn-default'>".$this->Form->postLink('Se désister de cette annonce',
                                array( 'action' => 'desisterAnnonce', $annonce['Annonce']['id']))."</div>";
                        echo '<div class="alert alert-info">Vous avez déjà réservé cette annonce</div> ';
                    }else if($annonce['Annonce']['user_id'] == AuthComponent::user('id')){
                        echo "<div class='btn btn-default'>".$this->Form->postLink('Refuser offre de service',
                                array( 'action' => 'refuserOffre', $annonce['Annonce']['id']))."</div>";
                    } else{
                        echo '<div class="alert alert-warning">Cette annonce a déjà une réservation</div> ';
                    }
                }
            }else{
                echo '<div class="alert alert-warning">Cette annonce est clôturée.</div> ';
            }

            ?>
		</tr>
		</tbody>
</div>
</table>
