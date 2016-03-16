<!-- app/View/Users/add.ctp -->
<div class="users form">

	<?php echo $this->Form->create('User', array('type' => 'file', 'class'=>'form-inline'));?>
	<fieldset>

		<div class="alert-warning" style="text-align: center; color: #404040">Champ obligatoire<span style="color: #e32; display:inline;">*</span> </div>

		<div class="table-responsive">
			<table class="table table-striped" style="text-align:center;">
				<thead>
				<tr>
					<th colspan="99"><legend><?php echo __('INSCRIPTION'); ?></legend></th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td><?php
						echo $this->Form->input('username',
							array('label' => 'Nom d\'utilisateur</td><td>',
								'class' => 'form-control',));
						?></td>
				</tr>
				<tr>
					<td><?php
						echo $this->Form->input('password',
							array('label' => 'Mot de passe</td><td>',
								'class' => 'form-control'));?></td>
				</tr>
				<tr>
					<td><?php
						echo $this->Form->input('passwordconfirm',
							array('label' => 'Confirmer mot de passe</td><td>',
								'type' => 'password',
								'class' => 'form-control'));?></td>
				</tr>
				<tr>
					<td><?php
						echo $this->Form->input('nom',
							array('label' => 'Nom</td><td>',
								'class' => 'form-control'));?></td>
				</tr>
				<tr>
					<td><?php
						echo $this->Form->input('prenom',
							array('label' => 'Prénom</td><td>',
								'class' => 'form-control'));?></td>
				</tr>
				<tr>
					<td><?php
						echo $this->Form->input('date_naissance',
							array('label' => 'Date de naissance</td><td>',
								'dateFormat' => 'DMY',
								'minYear' => date('Y') - 150,
								'maxYear' => date('Y'),
								'class' => 'form-control'));?></td>
				</tr>
				<tr>
					<td><?php
						echo $this->Form->input('mail',
							array('label' => 'Mail</td><td>',
								'class' => 'form-control'));?></td>
				</tr>
				<tr>
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
				<tr>
					<td><?php
						echo $this->Form->input('code_postal',
							array('label' => 'Code Postal</td><td>',
								'class' => 'form-control',
								'size' => 5,
								'type' => 'text'));?></td>
				</tr>
				<tr>
					<td><?php
						echo $this->Form->input('ville',
							array('label' => 'Ville</td><td>',
								'class' => 'form-control',
								'maxLength' => '100'));?></td>
				</tr>
				<tr>
					<td><?php
						echo $this->Form->input('avatar',
							array('type' => 'file',
								'label' => 'Avatar</td><td>'));?></td>
				</tr>
				<tr>
					<td><?php
						echo $this->Form->input('presentation',
							array('label' => 'Présentation</td><td>',
								'class' => 'form-control',
								'rows' => '3',
								'cols' => '65'));?></td>
				</tr>
				<tr>
					<td><?php
						echo $this->Form->input('question_secrete',
							array('options' =>
								array("Quel est le nom de votre animal de compagnie ?",
									"Dans quelle ville êtes-vous né ?",
									"Quel était le modèle de votre première voiture ?",
									"Combien de frères et soeurs avez-vous ?",
									"Quel est le nom de jeune fille de votre mère ?"),
								'empty' => '(choisissez)',
								'label' => 'Question secrète</td><td>',
								'class' => 'form-control'));?></td>
				</tr>
				<tr>
					<td><?php
						echo $this->Form->input('reponse_secrete',
							array('label' => 'Réponse secrète</td><td>',
								'class' => 'form-control',
								'maxLength' => '100'));?></td>
				</tr>
				<tr>
                    <td><?php
                        $strings = array();
                        for($i=1; $i < count($types); $i++){
                            array_push($strings, $types[$i]['Type']['libelle']);
                        }
                        echo $this->Form->input('favoriteType',
                            array('options' =>
                                array($strings),
                                'empty' => 'Aucun',
                                'label' => 'Type de service favoris</td><td>',
                                'class' => 'form-control'));?>
                    </td>
				</tr>
				<tr class="info">
					<td colspan="99"><?php echo $this->Form->end(array('label'=>'Ajouter', 'class'=>'btn btn-primary'));?></td>
				</tr>
				</tbody>
		</div>
		</table>
	</fieldset>

	<br/><br/>

</div>