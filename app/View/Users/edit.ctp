<h1>Editer l\'utilisateur</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('nom');
echo $this->Form->input('prenom', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save User');
?>