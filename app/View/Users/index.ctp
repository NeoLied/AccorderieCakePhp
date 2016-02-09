<!-- File: /app/View/Utilisateurs/index.ctp -->

<h1>Utilisateurs</h1>
<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Username</th>
		<th>Crédit Temps</th>
	</tr>


	<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user['User']['id']; ?></td>
			<td>
				<?php echo $this->Html->link($user['User']['nom'],
					array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
			</td>
			<td><?php echo $user['User']['prenom']; ?></td>
			<td><?php echo $user['User']['username']; ?></td>
			<td><?php echo $user['User']['credit_temps']; ?></td>
			<td>
				<?php
				if($user['User']['id'] == AuthComponent::user('id') || AuthComponent::user('role') == "admin"){
					echo $this->Form->postLink(
						'Supprimer',
						array('action' => 'delete', $user['User']['id']),
						array('confirm' => 'Etes-vous sûr ?'));
					echo " ";
					echo $this->Html->link(
						'Editer',
						array('action' => 'edit', $user['User']['id'])
					);
					echo " ";


					if($user['User']['offre_de_bienvenue'] == 'non') {
						echo $this->Html->link(
							'Offre de bienvenue',
							array('action' => 'offre_bienvenue', $user['User']['id'])
						);
					}


				}
				if(AuthComponent::user('role') == "admin"){
					echo " ";
					echo $this->Html->link(
						'Avertir',
						'mailto:'.$user['User']['mail']
					);
				} ?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php unset($user); ?>
</table>