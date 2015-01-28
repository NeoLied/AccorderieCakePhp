<h1>Ajouter un utilisateur</h1>
<?php
echo $this->Form->create('Utilisateur');
echo $this->Form->input('login');
echo $this->Form->input('mdp');
echo $this->Form->end('Sauvegarder le gens');
?>