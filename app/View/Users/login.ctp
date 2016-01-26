 <div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<fieldset>

	<div class="table-responsive">
		<table class="table table-hover" style="text-align:center;">
			<thead>
			<tr>
				<th colspan="99"><legend><?php echo __('Merci d\'entrer votre nom d\'utiliateur et votre mot de passe'); ?></legend></th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><?php
					echo $this->Form->input('username',
						array('label' => 'Nom d\'utilisateur</td><td>',
							'class' => 'form-control',
							'maxlength' => '50'));
					?></td>
			</tr>
			<tr>
				<td><?php
					echo $this->Form->input('password',
						array('label' => 'Mot de passe</td><td>',
							'class' => 'form-control',
							'maxlength' => '100'));
					?></td>
			</tr>
			<tr>
				<td colspan="999"><?php echo $this->Html->link('Mot de passe oublié ?','/users/reset'); ?></td>
			</tr>
			<tr class="info">
				<td colspan="99"><?php echo $this->Form->end(array('label'=>'Connexion', 'class'=>'btn btn-primary'));?></td>
			</tr>
			</tbody>
	</div>
	</table>
</fieldset>
</div>