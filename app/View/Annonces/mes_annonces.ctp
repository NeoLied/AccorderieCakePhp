<?php echo $this->Form->create('Annonce'); ?>

<h1>Mes annonces</h1>

<table class="table table-hover">
    <tr>
        <th>Nature de l'annonce</th>
        <th>Titre</th>
        <th>Temps de travail</th>
        <th>Date de l'annonce</th>
        <th>Date Limite</th>

    </tr>

    <?php foreach ($annonces as $annonce): ?>
    <tr>
        <td>
            <?php echo ($annonce['Annonce']['demande'] == 0)? "Demande" : "Offre"; ?>
        </td>
        <td>
            <?php echo $this->Html->link($annonce['Annonce']['titre'],
            array('controller' => 'annonces', 'action' => 'view', $annonce['Annonce']['id'])); ?>
        </td>
        <td><?php echo $annonce['Annonce']['temps_requis']; ?></td>
        <td><?php echo $annonce['Annonce']['date_post']; ?></td>
        <td><?php echo $annonce['Annonce']['date_limite']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($annonce); ?>
</table>
