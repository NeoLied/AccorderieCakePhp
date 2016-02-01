<!-- Fichier : /app/View/Posts/add.ctp -->

<!--

Tout les SCRIPTS JS dans le fichier script.js !!
<script type="text/javascript">
  $(function() {
    $( "#datepicker" ).datepicker({ minDate: 0, altField: "#alternate", dateFormat: "dd/mm/yy"});
  });
</script>-->

<?php

echo $this->Form->create('Annonce');

echo $this->Form->input('date_post',array('type' => 'hidden','value' => date('Y-m-d')));
echo $this->Form->input('user_id',array('type' => 'hidden','value' => AuthComponent::user('id')));
?>

<div class="table-responsive">
  <table class="table table-hover" style="text-align:center;">
    <thead>
    <tr>
      <th colspan="99"><legend><h1>Ajouter une annonce</h1></legend></th>
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
            array('label' => 'Temps requis</td><td>',
                'class' => 'form-control',
                'empty' => '',
                'options' => array(0,1, 2, 3, 4, 5 , 6 , 7)));?></td>
    </tr>
    <tr>
      <td><?php
        echo $this->Form->input('date_limite',
            array('label' => 'Date limite</td><td>',
                'type' => 'text',
                'class' => 'form-control',
                'id' => "datepicker",
                'empty' => '' ));?></td>
    </tr>
    <tr class="active">
      <td><?php
        echo $this->Form->input('type_id',
            array('label' => 'Type</td><td>',
                'class' => 'form-control',
                'empty' => '',
                'options' => $type));?></td>
    </tr>

    <?php $attributes = array('legend' => false, 'class' => 'form-control'); ?>
    <tr>
      <td style="vertical-align:middle">
        <label>Type d'annonce</label>
      </td>
      <td><?php
        echo $this->Form->radio('radio', array('0' => 'Demande'), $attributes) . $this->Form->radio('radio', array('1' => 'Offre'), $attributes);
        ?>
      </td>
    </tr>
    <tr class="info">
      <td colspan="99"><?php echo $this->Form->end(array('label'=>'Sauvegarder l\'annonce', 'class'=>'btn btn-primary'));?></td>
    </tr>
    </tbody>
</div>
</table>
