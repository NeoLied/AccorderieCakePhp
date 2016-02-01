
<h1>Valider votre annonce</h1>

<p>L'annnonce a bien été réalisé par <?php echo $this->Html->link($offreur['User']['username'],
        array('action' => 'users', $offreur['User']['id']))  ?></p>

<td><?php echo $this->Html->link(
    "Cloturer l'annonce",
    array('action' => 'cloturer_annonce', $annonce['Annonce']['id'])
); ?>
</td>

<td><?php echo $this->Html->link(
        'Retour',
        array('action' => 'mes_annonces',)
    );
    ?></td>
