<!-- File: /app/View/Posts/index.ctp -->

<h1>Annonces</h1>
<?php echo $this->Html->link(
    'Acceder aux Demandes',
    '/annonces/demande/',
    array('class' => 'btn btn-default')); ?>

<?php echo $this->Html->link(
    'Acceder aux Offres',
    '/annonces/offre/',
    array('class' => 'btn btn-default')); ?>

<table class="table table-hover">
    <tr>
        <!--<th>Id</th>-->
        
        <th>Nom</th>
        
        <th>Titre</th>
        <!--<th>Description</th>-->
        <th>Temps de travail</th>
        <th>Date de l'annonce</th>
        <th>Date Limite</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($annonces as $annonce): ?>
    <tr>
        <!--<td><?php echo $annonce['Annonce']['id']; ?></td>-->
        <td><?php echo $annonce['User']['prenom']; ?></td>
        <td>
            <?php echo $this->Html->link($annonce['Annonce']['titre'],
            array('controller' => 'annonces', 'action' => 'view', $annonce['Annonce']['id'])); ?>
        </td>
        <!--<td><?php //echo $annonce['Annonce']['description']; ?></td>-->
        <td><?php echo $annonce['Annonce']['temps_requis']; ?></td>
        <td><?php echo date("d / m / Y", strtotime($annonce['Annonce']['date_post'])); ?></td>
        <td><?php echo date("d / m / Y", strtotime($annonce['Annonce']['date_limite'])); ?></td>
        <td style="text-align: right">
        
         <?php echo $this->Form->postLink(
                'Signaler cette annonce',
                array('action' => 'signaler', $annonce['Annonce']['id']));
         ?>
            
         <?php
         if($annonce['Annonce']['user_id'] == AuthComponent::user('id') || AuthComponent::user('role') == "admin"){
         	echo $this->Form->postLink(
                'Supprimer',
                array('action' => 'delete', $annonce['Annonce']['id']),
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