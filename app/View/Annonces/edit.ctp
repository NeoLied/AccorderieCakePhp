<!-- Fichier: /app/View/Posts/edit.ctp -->
<?php
echo $this->Form->create('Annonce', array('class'=>'form-inline'));

echo $this->Form->input('id', array('type' => 'hidden'));

?>

<div class="table-responsive">
  <table class="table table-hover" style="text-align:center;">
    <thead>
    <tr>
      <th colspan="99"><legend>Editer l'annonce</legend></th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td><?php
        echo $this->Form->input('titre',
            array('label' => 'Titre</td><td>',
                'class' => 'form-control',));
        ?></td>
    </tr>
    <tr class="active">
      <td><?php
        echo $this->Form->input('description',
            array('label' => 'Description</td><td>',
                'class' => 'form-control',
                'rows' => '3'));?></td>
    </tr>
    <tr>
      <td><?php
        echo $this->Form->input('temps_requis',
            array('label' => 'Temps estimé</td><td>',
                'options' => array(0,1, 2, 3, 4, 5 , 6 , 7),
                'class' => 'form-control'));?></td>
    </tr>
    <tr>
      <td><?php
        echo $this->Form->input('type_id',array(
            'label' => 'Type de l\'annonce</td><td>',
            'options' => $type,
            'class' => 'form-control' ));?></td>
    </tr>
    <tr class="info">
      <td colspan="99"><?php echo $this->Form->end(array('label'=>'Valider', 'class'=>'btn btn-primary'));?></td>
    </tr>
</div>
</table>