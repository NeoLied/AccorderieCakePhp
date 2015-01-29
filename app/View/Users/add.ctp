<h1>Ajouter un user</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('login');
echo $this->Form->input('mdp');
echo $this->Form->input('nom');
echo $this->Form->input('prenom');
echo $this->Form->input('mail');
echo $this->Form->input('adresse');
echo $this->Form->input('code_postal');
echo $this->Form->input('telephone');
echo $this->Form->end('Sauvegarder le gens');
?>