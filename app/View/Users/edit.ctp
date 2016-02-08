<!-- Fichier: /app/View/Posts/edit.ctp -->
<?php

echo $this->Form->create('User', array('class'=>'form-inline', 'label' => 'User'));

/*echo $this->Form->input('type', array(
'type' => 'select',
'options' => $type,
'multiple' => 'checkbox'
));*/

echo $this->Form->input('id', array('type' => 'hidden'));
?>

<div class="table-responsive">
	<table class="table table-hover" style="text-align:center;">
		<thead>
		<tr>
			<th colspan="99"><legend>Editer l'utilisateur</legend></th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><?php
				echo $this->Form->input('nom',
					array('label' => 'Nom</td><td>',
						'class' => 'form-control'));?></td>
		</tr>
		<tr>
			<td><?php
				echo $this->Form->input('prenom',
					array('label' => 'Prenom</td><td>',
						'class' => 'form-control'));?></td>
		</tr>
		<tr>
			<td><?php
				echo $this->Form->input('mail',
					array('label' => 'Mail</td><td>',
						'class' => 'form-control'));?></td>
		</tr>
		<tr class="active">
			<td><?php
				echo $this->Form->input('telephone',
					array('label' => 'Téléphone</td><td>',
						'class' => 'form-control'));?></td>
		</tr>
		<tr>
			<td><?php
				echo $this->Form->input('adresse',
					array('label' => 'Adresse</td><td>',
						'class' => 'form-control'));?></td>
		</tr>
		<tr class="active">
			<td><?php
				echo $this->Form->input('code_postal',
					array('label' => 'Code Postal</td><td>',
						'class' => 'form-control',
						'maxlength' => '5'));?></td>
		</tr>
		<tr>
			<td><?php
				echo $this->Form->input('ville',
					array('label' => 'Ville</td><td>',
						'class' => 'form-control'));?></td>
		</tr>
		<tr class="active">
			<td><?php
				echo $this->Form->input('avatarnew',
					array('type' => 'file',
						'label' => 'Avatar</td><td>'));?></td>
		</tr>
		<tr>
			<td><?php
				echo $this->Form->input('presentation',
					array('label' => 'Présentation</td><td>',
						'class' => 'form-control'));?></td>
		</tr>
		<?php if(AuthComponent::user('id') == $this->request->data['User']['id']) { ?>
		<tr class="active">
			<td><?php
				echo $this->Form->input('passwordnew',
					array('label' => 'Nouveau mot de passe</td><td>',
						'class' => 'form-control',
						'value' => '',
						'type' => 'password'));?></td>
		</tr>
		<tr>
			<td><?php
				echo $this->Form->input('passwordnewconfirm',
					array('label' => 'Confirmer mot de passe</td><td>',
						'type' => 'password',
						'value' => '',
						'class' => 'form-control'));?></td>
		</tr>
		<?php } if(AuthComponent::user('role') == "admin") { ?>
		<tr>
			<td style="vertical-align:middle">
				<label>Type de compte</label>
			</td>
			<td><?php
				$attributes = array('legend' => false, 'class' => 'form-control');
				echo $this->Form->radio('role',
								array(
										'admin' => 'Admin',
										'' => 'Utilisateur')
								, $attributes)
//						.
//						$this->Form->radio('role',
//								array('utilisateur' => 'Utilisateur'), $attributes);
				?></td>
		</tr>
		<?php } ?>
		<tr class="info">
			<td colspan="99"><?php echo $this->Form->end(array('label'=>'Modifier', 'class'=>'btn btn-primary'));?></td>
		</tr>
		</tbody>
</div>
</table>