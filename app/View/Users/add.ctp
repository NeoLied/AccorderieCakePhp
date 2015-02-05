<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User', array('type' => 'file'));?>
    <fieldset>
        <legend><?php echo __('Ajouter Utilisateur'); ?></legend>
        <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('nom');
        echo $this->Form->input('prenom',
        	array('label' => 'Prénom'));
        echo $this->Form->input('date_naissance',
        	array('label' => 'Date de naissance',
        	'dateFormat' => 'DMY',
        	'minYear' => date('Y') - 150,
        	'maxYear' => date('Y')));
        echo $this->Form->input('mail');
        echo $this->Form->input('telephone');
        echo $this->Form->input('adresse');
        echo $this->Form->input('code_postal');
        echo $this->Form->input('ville');
        echo $this->Form->input('avatar',
        	array('type' => 'file',
        	'label' => 'Avatar'));
 		echo $this->Form->input('identite',
        	array('type' => 'file',
        	'label' => 'Photocopie carte d\'identité'));
 		echo $this->Form->input('presentation');
 		echo $this->Form->input('reponse_secrete');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Ajouter'));?>
</div>