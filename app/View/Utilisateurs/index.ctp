<h1>Liste des utilisateurs</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Login</th>
    </tr>

    <?php foreach ($utilisateurs as $utilisateur): ?>
    <tr>
        <td><?php echo $utilisateur['Utilisateur']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($utilisateur['Utilisateur']['login'],
            array('controller' => 'utilisateurs', 'action' => 'view', $utilisateur['Utilisateur']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($utilisateur); ?>
</table>