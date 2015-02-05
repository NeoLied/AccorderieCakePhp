<!-- Fichier : /app/View/Posts/view.ctp -->

<h1><b><?php echo h($annonce['Annonce']['titre']); ?></b></h1>

<p><small>Créée le : <b><?php echo $annonce['Annonce']['date_post']; ?></b></small> par <b><?php echo $annonce['User']['username']; ?></b></p> 
<p>Description :</p>
<p style="text-align:justify;"><?php echo $annonce['Annonce']['description']; ?></p>
<p>Temps estimé : <b><?php echo $annonce['Annonce']['temps_requis']; ?>H</b></p>
<p>Coordonnées de la personne :</p>
<p><b><?php echo $annonce['User']['prenom']; ?> <?php echo $annonce['User']['nom']; ?></b></p>
<p>Téléphone : <b><?php echo $annonce['User']['telephone']; ?></b></p> 
<p>Adresse mail : <b><?php echo $annonce['User']['mail']; ?> </b></p>

<?php 
if($annonce['Annonce']['id_accepteur'] == 0)
{
	echo $this->Form->postLink('Réserver cette annonce',array('action' => 'reservation', $annonce['Annonce']['id'],AuthComponent::user('id'),$annonce['Annonce']['user_id']));
}
else
{
	?> cette annonce a déjà une réservation <?php
}
?>