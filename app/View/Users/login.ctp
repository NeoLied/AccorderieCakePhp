<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<fieldset>
	<legend>
		<?php echo __('Merci d\'entrer votre username et password'); ?>
	</legend>
	<?php echo $this->Form->input('login');
		  echo $this->Form->input('mdp'); ?>
</fieldset>
<?php echo $this->Form->end(__('login')); ?>
</div>