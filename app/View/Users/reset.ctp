<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>

        <div class="table-responsive">
            <table class="table table-hover" style="text-align:center;">
                <thead>
                <tr>
                    <th colspan="99"><legend><?php echo 'Merci d\'entrer votre adresse e-mail'; ?></legend></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php
                        echo $this->Form->input('mail',
                            array('label' => 'Adresse e-mail</td><td>',
                                'class' => 'form-control',
                                'maxlength' => '100'));
                        ?></td>
                </tr>
                <tr class="info">
                    <td colspan="99"><?php echo $this->Form->end(array('label'=>'Réinisialiser le mot de passe', 'class'=>'btn btn-primary'));?></td>
                </tr>
                </tbody>
        </div>
        </table>
    </fieldset>
</div>