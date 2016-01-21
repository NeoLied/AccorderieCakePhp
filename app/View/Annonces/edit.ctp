<!-- Fichier: /app/View/Posts/edit.ctp -->

<h1>Editer l'annonce</h1>
<?php
echo $this->Form->create('Annonce');
echo $this->Form->input('titre');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('temps_requis', array(
      'options' => array(0,1, 2, 3, 4, 5)
  ));
echo $this->Form->input('type_id',array(
    'options' => $type
));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Valider');
?>