<?php echo $this->Form->create('Annonce'); ?>

<h1>Mon historique trop bogoss</h1>

<table>
    <tr>
        <th>Titre</th>
        <th>Possesseur</th>
        <th>Services Rendus</th>
        <th>Services que l'on vous a rendu</th>
        <th>Date de l'annonce</th>
    </tr>

    <?php foreach ($annonces as $annonce): ?>
    <tr>
    
    	<?php
    	if(
    		$annonce['Annonce']['id_accepteur'] == AuthComponent::user('id') &&
    		$annonce['Annonce']['demande'] == 1
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
    	
    	<?php
    	if(
    		$annonce['Annonce']['id_accepteur'] == AuthComponent::user('id') &&
    		$annonce['Annonce']['demande'] == 0
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
    	
    	<?php
    	if(
    		$annonce['Annonce']['user_id'] == AuthComponent::user('id') &&
    		$annonce['Annonce']['demande'] == 1
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
       	
    </tr>
    <?php endforeach;
   		//echo "Total :".$solde_total[0]['users']['credit_temps'];
    ?>
    <?php unset($annonce); ?>
</table>
