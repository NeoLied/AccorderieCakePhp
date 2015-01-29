<!-- File: /app/View/Posts/validation.ctp -->

<?php echo $this->Form->create('Annonce'); ?>

<h1>Validation annonces</h1>

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
                array('confirm' => "Etes-vous sûr ?"));?>
          </td>
          <td>
                <?php echo $this->Form->postLink(
                'Valider Annonce',
                array('action' => 'validateSelect', $annonce['Annonce']['id']));
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($annonce); ?>
</table>
