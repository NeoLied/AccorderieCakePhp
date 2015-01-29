<!-- Fichier : /app/View/Posts/add.ctp -->

<h1>Ajouter une annonce</h1>
<?php
echo $this->Form->create('Annonce');
echo $this->Form->input('titre');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('temps_requis', array(
		'empty' => '(choisissez)',
      'options' => array(0,1, 2, 3, 4, 5)
  ));
$options = array('0' => 'Demande', '1' => 'Offre');
$attributes = array('legend' => false);
echo $this->Form->radio('demande', $options, $attributes);
echo $this->Form->input('date_post',array('type' => 'hidden','value' => date('Y-m-d')));
echo $this->Form->end('Sauvegarder annonce');
?>