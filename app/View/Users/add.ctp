<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User', array('type' => 'file'));?>
    <fieldset>
        <legend><?php echo __('Ajouter Utilisateur'); ?></legend>
        <?php
        echo $this->Form->input('username',
        	array('label' => 'Nom d\'utilisateur'));
        	
        echo $this->Form->input('password',
        	array('label' => 'Mot de passe'));
        	
        echo $this->Form->input('passwordconfirm',
        	array('label' => 'Confirmer mot de passe',
        		'type' => 'password'));
        	
        echo $this->Form->input('nom');
        
        echo $this->Form->input('prenom',
        	array('label' => 'Prénom'));
        	
        echo $this->Form->input('date_naissance',
        	array('label' => 'Date de naissance',
        	'dateFormat' => 'DMY',
        	'minYear' => date('Y') - 150,
        	'maxYear' => date('Y')));
        	
        echo $this->Form->input('mail');
        
        echo $this->Form->input('telephone',
        	array('label' => 'Téléphone'));
        	
        echo $this->Form->input('adresse');
        
        echo $this->Form->input('code_postal',
        	array('label' => 'Code Postal'));
        	
        echo $this->Form->input('ville');
        
        echo $this->Form->input('avatar',
        	array('type' => 'file',
        	'label' => 'Avatar'));
        	
 		echo $this->Form->input('presentation',
        	array('label' => 'Présentation'));
        	
 		echo $this->Form->input('question_secrete',
 			array('options' =>
 				array("Quel est le nom de votre animal de compagnie ?",
      					"Dans quelle ville êtes-vous né ?",
      					"Quel était le modèle de votre première voiture ?",
      					"Combien de frères et soeurs avez-vous ?",
      					"Quel est le nom de jeune fille de votre mère ?"),
      			'empty' => '(choisissez)',
      			'label' => 'Question secrète'));
      	
 		echo $this->Form->input('reponse_secrete',
        	array('label' => 'Réponse secrète'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Ajouter'));?>
</div>