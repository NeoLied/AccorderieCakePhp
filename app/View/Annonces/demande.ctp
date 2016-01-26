<h1>Demandes</h1>


<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Pseudo proposant</th>
        <th>Titre</th>
        <th>Type d'annonce</th>
        <th>Description</th>
        <th>Temps de travail</th>
        <th>Date de l'annonce</th>
        <th>Date limite</th>
    </tr>
    <?php foreach ($annonces as $annonce): ?>
    <tr>

        <td><?php echo $annonce['Annonce']['id']; ?></td>

        <td> <?php echo $this->Html->link($annonce['User']['username'],
                array('controller' => 'users', 'action' => 'view', $annonce['Annonce']['user_id'])); ?></td>
        <td>
            <?php echo $this->Html->link($annonce['Annonce']['titre'],
            array('controller' => 'annonces', 'action' => 'view', $annonce['Annonce']['id'])); ?>
        </td>
        <td><?php echo $annonce['Type']['libelle']?>

        </td>
        <td><?php echo $annonce['Annonce']['description']; ?></td>
        <td><?php echo $annonce['Annonce']['temps_requis']; ?></td>
        <td><?php echo $annonce['Annonce']['date_post']; ?></td>
        <td><?php echo $annonce['Annonce']['date_limite']; ?></td>
        <td>
         <?php 
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