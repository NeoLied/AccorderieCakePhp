<h1>Consulter les demandes de services</h1>

<?php echo $this->Html->link(
    'Acceder aux Offres',
    '/annonces/offre/',
    array('class' => 'btn btn-default')); ?>

<table class="table table-hover">
    <tr>
        <td colspan="4" class="info"><?php
            echo $this->Form->create(null,array('class' => 'form-group'));
            echo "<span class='col-xs-4'>".$this->Form->input('Type',array(
                    'label' => 'Filtrer par types :</td><td colspan="4" class="info">',
                    'class' => 'form-controller select input form-control',
                    'empty' => 'Tous',
                    'type' => 'select'
                ))."</span>";
            echo $this->Form->end();
            ?></td colspan="4">
    </tr>

    <tr>
        <th>Demandeur</th>
        <th>Titre</th>
        <th>Type d'annonce</th>
        <th>Description</th>
        <th>Temps de travail</th>
        <th>Date de l'annonce</th>
        <th>Date limite</th>
        <th>Statut</th>
    </tr>


    <?php foreach ($annoncesUrgentes as $annonce): ?>
    <tr class="ligneAnnonce">
        <td><?php echo $annonce['Annonce']['id']; ?></td>

        <td> <?php echo $this->Html->link($annonce['User']['username'],
                array('controller' => 'users', 'action' => 'view', $annonce['Annonce']['user_id'])); ?></td>
        <td>
            <?php echo $this->Html->link($annonce['Annonce']['titre'],
            array('controller' => 'annonces', 'action' => 'view', $annonce['Annonce']['id']),
                array('class' => 'lienAuteur')); ?>
        </td>
        <td><?php echo $annonce['Type']['libelle']?>

        </td>
        <td><?php echo $annonce['Annonce']['description']; ?></td>
        <td><?php echo $annonce['Annonce']['temps_requis']; ?></td>
        <td><?php echo $annonce['Annonce']['date_post']; ?></td>
        <td><?php echo $annonce['Annonce']['date_limite']; ?></td>
        <td><?php echo $annonce['Annonce']['statut']; ?></td>



        <td><?php echo date("d / m / Y", strtotime($annonce['Annonce']['date_post'])); ?></td>
        <td><?php echo date("d / m / Y", strtotime($annonce['Annonce']['date_limite'])); ?></td>
        <td>
         <?php
         // BOUTONS SUPPRIMER - EDITER
         if($annonce['Annonce']['user_id'] == AuthComponent::user('id') || AuthComponent::user('role') == "admin"){
         	echo $this->Form->postLink(
                'Supprimer',
                array('action' => 'delete', $annonce['Annonce']['id'],'index'),
                array('confirm' => "Êtes-vous sûr ?"));
			echo " ";
			echo $this->Html->link(
                'Editer',
                array('action' => 'edit', $annonce['Annonce']['id'])
            );
        }?>
        </td>
</tr>
    <?php endforeach; ?>
    <?php unset($annonce); ?>

        <?php foreach ($annoncesNormales as $annonce): ?>
    <tr class="ligneAnnonce">
            <td><?php echo $annonce['Annonce']['id']; ?></td>

            <td> <?php echo $this->Html->link($annonce['User']['username'],
                    array('controller' => 'users', 'action' => 'view', $annonce['Annonce']['user_id'])); ?></td>
            <td>
                <?php echo $this->Html->link($annonce['Annonce']['titre'],
                    array('controller' => 'annonces', 'action' => 'view', $annonce['Annonce']['id']),
                    array('class' => 'lienAuteur')); ?>
            </td>
            <td><?php echo $annonce['Type']['libelle']?>

            </td>
            <td><?php echo $annonce['Annonce']['description']; ?></td>
            <td><?php echo $annonce['Annonce']['temps_requis']; ?></td>
            <td><?php echo $annonce['Annonce']['date_post']; ?></td>
            <td><?php echo $annonce['Annonce']['date_limite']; ?></td>
            <td><?php echo $annonce['Annonce']['statut']; ?></td>



            <td>
                <?php
                // BOUTONS SUPPRIMER - EDITER
                if($annonce['Annonce']['user_id'] == AuthComponent::user('id') || AuthComponent::user('role') == "admin"){
                    echo $this->Form->postLink(
                        'Supprimer',
                        array('action' => 'delete', $annonce['Annonce']['id'],'index'),
                        array('confirm' => "Êtes-vous sûr ?"));
                    echo " ";
                    echo $this->Html->link(
                        'Editer',
                        array('action' => 'edit', $annonce['Annonce']['id'])
                    );
                }?>
            </td>
</tr>
        <?php endforeach; ?>
        <?php unset($annonce); ?>

        <?php foreach ($annoncesExpires as $annonce): ?>
            <tr class="ligneAnnonce">
            <td><?php echo $annonce['Annonce']['id']; ?></td>

            <td> <?php echo $this->Html->link($annonce['User']['username'],
                    array('controller' => 'users', 'action' => 'view', $annonce['Annonce']['user_id'])); ?></td>
            <td>
                <?php echo $this->Html->link($annonce['Annonce']['titre'],
                    array('controller' => 'annonces', 'action' => 'view', $annonce['Annonce']['id']),
                    array('class' => 'lienAuteur')); ?>
            </td>
            <td><?php echo $annonce['Type']['libelle']?>

            </td>
            <td><?php echo $annonce['Annonce']['description']; ?></td>
            <td><?php echo $annonce['Annonce']['temps_requis']; ?></td>
            <td><?php echo $annonce['Annonce']['date_post']; ?></td>
            <td><?php echo $annonce['Annonce']['date_limite']; ?></td>
            <td><?php echo $annonce['Annonce']['statut']; ?></td>



            <td>
                <?php
                // BOUTONS SUPPRIMER - EDITER
                if($annonce['Annonce']['user_id'] == AuthComponent::user('id') || AuthComponent::user('role') == "admin"){
                    echo $this->Form->postLink(
                        'Supprimer',
                        array('action' => 'delete', $annonce['Annonce']['id'],'index'),
                        array('confirm' => "Êtes-vous sûr ?"));
                    echo " ";
                    echo $this->Html->link(
                        'Editer',
                        array('action' => 'edit', $annonce['Annonce']['id'])
                    );
                }?>
            </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($annonce); ?>
</table>