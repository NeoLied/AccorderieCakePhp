
<h1>Valider votre annonce</h1>

<p>L'annnonce a bien été réalisé par <?php echo $this->Html->link($offreur['User']['username'],
        array('controller' => 'users', 'action' => 'view', $annonce['Annonce']['id_accepteur'])); ?></p>

<h2>Evaluation du service : </h2>
<td>
    <?php
    echo $this->Form->create('Evaluation',array(
        "url" => array('controller' =>'annonces' ,'action' =>'cloturer_annonce'),
        'class'=>'form-inline'
    ));

    echo $this->Form->input('Annonce.id', array(
        'type' =>'hidden',
        'value' => $annonce['Annonce']['id']
    ));
    echo $this->Form->input('Annonce.archive', array(
        'type' =>'hidden',
        'value' => 1
    ));
    ?>
    <?php
    echo $this->Form->input('note', array(
        'options' => array(1, 2, 3, 4, 5,6,7,8,9,10),
        'class' => array("form-control col-sm-2"),
        'empty' => 'Choisissez une note entre 1 et 10',
        'label' =>''
    ));
    ?>

    <?php
    echo $this->Form->input('Clotûrer votre annonce', array(
        'type' => "submit",
        'class'=>'form-control btn btn-success col-sm-2',
        'label'=>''
    ));

    ?>



    <?php echo $this->Form->end(); ?>
</td>



<td><?php echo $this->Html->link(
        'Retour',
        array('action' => 'mes_annonces' ),
        array('class'=>'btn btn-warning')


    );
    ?></td>
