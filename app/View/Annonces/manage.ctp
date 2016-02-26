<div id="gestion_annonce">
    <table style="width: 100%;" border="0"><tr><td style="min-width: 25vw;">
    <h3 class="center-block">Gérer les types de service</h3>
    <div id="table_types" class="table-responsive">
        <table class="table table-striped" style="text-align:center;">
            <thead>
            <tr>

                <td>Type de services</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($types as $type){ ?>
                <tr>

                    <td><?php  echo $type['Type']['libelle'] ; ?></td>
                    <td>
                        <?php echo $this->Html->link('Supprimer', '/types/delete/'.$type['Type']['id']); ?>
                        <?php // $this->Html->link('Renommer', '/types/rename/'.$type['Type']['id']); ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="form-inline">
            <div class="form-group">
                <?php
                echo $this->Form->create('Type');
                echo $this->Form->input('id', array('type' => 'hidden'));
                ?>


                <?php

                echo $this->Form->input('libelle',array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'label' => '',
                    'size' => 25,
                    'placeholder' => "Ajouter un nouveau type"
                ));

                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->end(array(
                    'label' => 'Ajouter',
                    'class' => 'form-control btn btn-success',
                    'size' => 15)); ?>
            </div>

        </div>

    </div>
                </td><td style="min-width: 25vw">
            </td><td style="min-width: 25vw; vertical-align: top;">
                <h3 class="center-block">Gérer le crédit temps</h3>
    <div id="table_types" class="table-responsive">

        <div class="form-inline" style="text-align:center;">
            <div class="form-group">
                <?php
                echo $this->Form->create('Parametres');
                ?>

                <?php

                echo $this->Form->input('limiteTemps',array(
                    'type' => 'number',
                    'class' => 'form-control',
                    'label' => '',
                    'size' => 30,
                    'placeholder' => "Crédit temps max"
                ));

                ?>
            </div>
            <br/>
            <div class="form-group">
                <?php echo $this->Form->end(array(
                    'label' => 'Enregistrer',
                    'class' => 'form-control btn btn-success',
                    'size' => 15)); ?>
            </div>

        </div>

    </div>
            </td></tr></table>

</div>

