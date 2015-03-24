<!-- Fichier: /app/View/Posts/edit.ctp -->

<h1>Editer l'utilisateur</h1>
<?php
echo $this->Form->create('User');
		
echo $this->Form->input('mail');

echo $this->Form->input('telephone',
	array('label' => 'Téléphone'));
	
echo $this->Form->input('adresse');

echo $this->Form->input('code_postal',
	array('label' => 'Code Postal'));
	
echo $this->Form->input('ville');

echo $this->Form->input('avatarnew',
	array('type' => 'file',
	'label' => 'Avatar'));
	
echo $this->Form->input('presentation',
	array('label' => 'Présentation'));
	
echo $this->Form->input('passwordnew',
	array('label' => 'Nouveau mot de passe',
		'value' => '',
		'type' => 'password'));
		
echo $this->Form->input('passwordnewconfirm',
	array('label' => 'Confirmer nouveau mot de passe',
		'value' => '',
		'type' => 'password'));
		
echo $this->Form->input('type', array(
	'type' => 'select',
    'options' => $type,
    'multiple' => 'checkbox'
  )); 
        	
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save User');
?>