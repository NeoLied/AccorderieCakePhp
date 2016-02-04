<!-- File: /app/View/Posts/offre.ctp -->
<h1>Consulter les offres de services</h1>

<?php echo $this->Html->link(
    'Acceder aux Demandes',
    '/annonces/demande/',
    array('class' => 'btn btn-default')); ?>

<table class="table table-hover strip">

    <tr>
        <td colspan="4" class="info"><?php
            echo $this->Form->create(null,array('class' => 'form-group'));
            echo "<span class='col-xs-4'>".$this->Form->input('type_id',array(
                    'label' => 'Filtrer par types :</td><td colspan="99" class="info">',
                    'class' => 'form-controller select input form-control',
                    'empty' => 'Tous',
                    'type' => 'select'
                ))."</span>";
            echo $this->Form->end();
            ?></td colspan="4">
    </tr>

    <tr>
        <th>Offreur</th>
        <th>Titre</th>
        <th>Type d'annonce</th>
        <th>Description</th>
        <th>Temps de travail</th>
        <th>Date de l'annonce</th>
        <th>Date Limite</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($annonces as $annonce): ?>
    <tr>
        <td><?php echo $annonce['User']['username']; ?></td>
        <td>
            <?php echo $this->Html->link($annonce['Annonce']['titre'],
            array('controller' => 'annonces', 'action' => 'view', $annonce['Annonce']['id'])); ?>
        </td>
        <td><?php echo $annonce['Type']['libelle']?>
        </td>
        <td><?php echo $annonce['Annonce']['description']; ?></td>
        <td><?php echo $annonce['Annonce']['temps_requis']; ?></td>
        <td><?php echo date("d / m / Y", strtotime($annonce['Annonce']['date_post'])); ?></td>
        <td><?php echo date("d / m / Y", strtotime($annonce['Annonce']['date_limite'])); ?></td>
        <td>
        
         <?php 
         if($annonce['Annonce']['user_id'] == AuthComponent::user('id') || AuthComponent::user('role') == "admin"){
         	echo $this->Form->postLink(
                'Supprimer',
                array('action' => 'delete', $annonce['Annonce']['id'],'offre'),
                array('confirm' => "Êtes-vous sûr ?"));
            echo " ";
            echo $this->Html->link(
                'Editer',
                array('action' => 'edit', $annonce['Annonce']['id'])
            );
         } ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($annonce); ?>

</table>