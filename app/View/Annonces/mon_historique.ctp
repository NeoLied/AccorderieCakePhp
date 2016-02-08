<?php echo $this->Form->create('Annonce'); 
?>

<h1>Mon historique</h1>

<table class="table table-hover">
    <tr>
        <th>Titre</th>
        <th>Possesseur</th>
        <th>Services Rendus</th>
        <th>Services que l'on vous a rendu</th>
        <th>Date de l'annonce</th>
    </tr>
    
<?php    
    if($offre_bienvenue[0]['users']['offre_de_bienvenue'] == "oui") {
    	?>
    	<tr>
    	<td>Offre de bienvenue</td>
       	<td>L'administration</td> 
       	<td style="color:blue;">+3 Heures</td>
        <td></td>
        <td></td>
    </tr>
    <?php
    }
   
?>    
    
    

    <?php
	 foreach ($annonces as $annonce): ?>
    <tr>
		<!--    Affiche toutes les demandes de l'utilisateur -->
		<?php

		if(
			$annonce['Annonce']['user_id'] == AuthComponent::user('id') &&
			$annonce['Annonce']['demande'] == 0
		)
		{
			?>
			<td><?php echo $annonce['Annonce']['titre']; ?></td>
			<td><?php echo $annonce['User']['username']; ?></td>
			<td></td>
			<td style="color:red;"><?php echo "-".$annonce['Annonce']['temps_requis']." Heures"; ?></td>
			<td><?php echo $annonce['Annonce']['date_post']; ?></td>
			<?php
		}

		?>
<!--    Affiche les demandes auxquelles l'utilisateur a répondu et réalisé -->
    	<?php
    	if(
    		$annonce['Annonce']['id_accepteur'] == AuthComponent::user('id') &&
    		$annonce['Annonce']['demande'] == 0 &&
			$annonce['Annonce']['archive'] == 1
    	)
    	{
    		?>
    		<td><?php echo $annonce['Annonce']['titre']; ?></td>
       		<td><?php echo $annonce['User']['username']; ?></td>
			<td style="color:green;"><?php echo "+".$annonce['Annonce']['temps_requis']." Heures"; ?></td>
       		<td></td>
        	<td><?php echo $annonce['Annonce']['date_post']; ?></td>
    		<?php
    	}
    	?>
		<!--    Affiche les demandes auxquelles l'utilisateur a répondu mais pas réalisé -->
		<?php
    	if(
    		$annonce['Annonce']['id_accepteur'] == AuthComponent::user('id') &&
    		$annonce['Annonce']['demande'] == 0 &&
			$annonce['Annonce']['archive'] == 0
    	)
    	{
    		?>
    		<td><?php echo $annonce['Annonce']['titre']; ?></td>
       		<td><?php echo $annonce['User']['username']; ?></td>
			<td style="color:green;"><?php echo " [Service en Cours de Réalisation]"; ?></td>
       		<td></td>
        	<td><?php echo $annonce['Annonce']['date_post']; ?></td>
    		<?php
    	}
    	?>


		<!--  Affiche  les offres que l'utilisateur a posté mais pas réalisé -->
    	<?php
    	if(
    		$annonce['Annonce']['user_id'] == AuthComponent::user('id') &&
    		$annonce['Annonce']['demande'] == 1 &&
    		$annonce['Annonce']['archive'] == 0
    	)
    	{
    		?>
    		<td><?php echo $annonce['Annonce']['titre']; ?></td>
       		<td><?php echo $annonce['User']['username']; ?></td>
        	<td style="color:green;"><?php echo "OFFRE DE SERVICE NON REALISE "; ?></td>
        	<td></td>
        	<td><?php echo $annonce['Annonce']['date_post']; ?></td>
    		<?php
    	}
    	?>
		<!--    Affiche les offres que l'utilisateur a posté et qu'il a rendu -->
		<?php
		if(
			$annonce['Annonce']['user_id'] == AuthComponent::user('id') &&
			$annonce['Annonce']['demande'] == 1 &&
			$annonce['Annonce']['archive'] == 1
		)
		{
			?>
			<td><?php echo $annonce['Annonce']['titre']; ?></td>
			<td><?php echo $annonce['User']['username']; ?></td>
			<td style="color:green;"><?php echo "+".$annonce['Annonce']['archive']." Heures."; ?></td>
			<td></td>
			<td><?php echo $annonce['Annonce']['date_post']; ?></td>
			<?php
		}
		?>
		<!--    Affiche les offres auxquelles l'utilisateur a répondu et qui ont été réalisés -->
		<?php
		if(
			$annonce['Annonce']['id_accepteur'] == AuthComponent::user('id') &&
			$annonce['Annonce']['demande'] == 1 &&
			$annonce['Annonce']['archive'] == 1
		)
		{
			?>
			<td><?php echo $annonce['Annonce']['titre']; ?></td>
			<td><?php echo $annonce['User']['username']; ?></td>

			<td></td>
			<td style="color:red;"><?php echo "-".$annonce['Annonce']['archive']." Heures."; ?></td>
			<td><?php echo $annonce['Annonce']['date_post']; ?></td>
			<?php
		}
		?>

    </tr>
    <?php endforeach;
   		//echo "Total :".$solde_total[0]['users']['credit_temps'];
    ?>
    <?php unset($annonce); ?>

</table>
