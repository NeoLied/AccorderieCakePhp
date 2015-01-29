<h1>Liste des utilisateurs</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Login</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Mail</th>
        <th>Adresse</th>
        <th>code_postal</th>
        <th>telephone</th>
    </tr>

    <?php foreach ($utilisateurs as $utilisateur): ?>
    <tr>
        <td><?php echo $utilisateur['Utilisateur']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($utilisateur['Utilisateur']['login'],
            array('controller' => 'utilisateurs', 'action' => 'view', $utilisateur['Utilisateur']['id'])); ?>
        </td>
        <td><?php echo $utilisateur['Utilisateur']['nom']; ?></td>
        <td><?php echo $utilisateur['Utilisateur']['prenom']; ?></td>
        <td><?php echo $utilisateur['Utilisateur']['mail']; ?></td>
        <td><?php echo $utilisateur['Utilisateur']['adresse']; ?></td>
        <td><?php echo $utilisateur['Utilisateur']['code_postal']; ?></td>
        <td><?php echo $utilisateur['Utilisateur']['telephone']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($utilisateur); ?>
</table>