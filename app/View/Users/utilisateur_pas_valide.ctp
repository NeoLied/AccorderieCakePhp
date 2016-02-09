

<h1>Utilisateurs non validées</h1>

<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Username</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['nom'],
                array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
        </td>
        <td><?php echo $user['User']['nom']; ?></td>
        <td><?php echo $user['User']['prenom']; ?></td>
        <td><?php echo $user['User']['username']; ?></td>

       <td>

           <?php
           echo $this->Form->postLink(
               'Supprimer',
               array('action' => 'delete', $user['User']['id']),
               array('confirm' => 'Etes-vous sûr ?'));
           echo " / ";
           echo $this->Html->link(
                   'Valider le compte',
                   array('action' => 'offre_bienvenue', $user['User']['id'])
               );

           ?>
       </td>

        <?php endforeach; ?>
        <?php unset($user); ?>
</table>

