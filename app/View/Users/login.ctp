<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<fieldset>
	
	<legend>
		<?php echo __('Merci d\'entrer votre username et password'); ?>
	</legend>
	<?php echo $this->Form->input('username');
		  echo $this->Form->input('password'); ?>
</fieldset>
<?php echo $this->Form->end(__('Connexion')); ?>
</div>