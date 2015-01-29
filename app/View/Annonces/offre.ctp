<!-- File: /app/View/Posts/offre.ctp -->


<h1>Offres</h1>

<?php echo $this->Html->link(
    'Ajouter une annonce',
    array('controller' => 'annonces', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Temps de travail</th>
        <th>Date de l'annonce</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($annonces as $annonce): ?>
    <tr>
        <td><?php echo $annonce['Annonce']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($annonce['Annonce']['titre'],
            array('controller' => 'annonces', 'action' => 'view', $annonce['Annonce']['id'])); ?>
        </td>
        <td><?php echo $annonce['Annonce']['description']; ?></td>
        <td><?php echo $annonce['Annonce']['temps_requis']; ?></td>
        <td><?php echo $annonce['Annonce']['date_post']; ?></td>
        <td>
        
         <?php echo $this->Form->postLink(
                'Supprimer',
                array('action' => 'delete', $annonce['Annonce']['id']),
                array('confirm' => "Etes-vous sûr ?"));
            ?>
            
            <?php echo $this->Html->link(
                'Editer',
                array('action' => 'edit', $annonce['Annonce']['id'])
            ); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($annonce); ?>
</table>