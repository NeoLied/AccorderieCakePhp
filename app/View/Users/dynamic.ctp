<?php
$check = "";
$favType = NULL;

if(!empty($prefs)){
    if($prefs[0]['u']['lastPost'] == true){
        $check = "checked";
    }

    $favType = $prefs[0]['u']['favoriteType'];
}else{
    $prefs = NULL;
}
?>

<div class="params">
    <form method="post" action="<?php echo $this->Html->url("/", true) ?>users/prefs">
        <b>Mes préférences : </b><br/>
        <ul class="list-group">
            <li class="list-group-item">Voir les dernières annonces ?<br/><input type="checkbox" name="last" <?php echo $check; ?>></php></li>
            <li class="list-group-item">Type d'annonce préféré <select name="favType"> <option value="NULL">Aucun</option>
                    <?php for($o=1; $o < count($types); $o++){
                        if($favType == $types[$o]['Type']['id']){
                            echo "<option value='".$types[$o]['Type']['id']."' selected>".$types[$o]['Type']['libelle']."</option>";
                        }else{
                            echo "<option value='".$types[$o]['Type']['id']."'>".$types[$o]['Type']['libelle']."</option>";
                        }
                    }?>
                </select></li>
            <li class="list-group-item"><input type="submit" name="save" value="Enregistrer" class="form-control btn btn-success"></li>
        </ul>
    </form>
</div>

<?php
if($prefs[0]['u']['lastPost'] == 1) {

    echo "<br/><u><h4>Les dernières annonces : </h4></u>";

    if (!empty($annonces)) {

        echo "<table class='table table-striped' style='width: auto;'>";

        echo "<tr>
        <th>Titre</th>
        <th>Annonce posté le</th>
        <th>Expire le</th>
        <th>Temps requis</th>

        <th>Annonceur</th>

        <th>Type d'annonce</th>
    </tr>";

        for ($i = 0; $i < count($annonces); $i++) {
            ?>

            <tr">
            <td>
                <a href="<?php echo $this->Html->url('/', true) . "annonces/view/" . $annonces[$i]['a']['id']; ?>"><?php echo $annonces[$i]['a']['titre']; ?></a>
            </td>
            <td><?php echo date("d/m/Y", strtotime($annonces[$i]['a']['date_post'])); ?></td>
            <td><?php echo date("d/m/Y", strtotime($annonces[$i]['a']['date_limite'])); ?></td>
            <td><?php echo $annonces[$i]['a']['temps_requis']; ?></td>

            <td><?php echo $annonces[$i]['u']['username']; ?></td>

            <td><?php echo $annonces[$i]['t']['libelle']; ?></td>
            </tr>

            <?php
        }

        echo "</table>";


    } else {
        echo "<b>Aucunes annonces disponibles</b>";
    }
}

if($prefs[0]['u']['favoriteType'] != 0){

echo "<br/><u><h4>Les dernières annonces de ".$prefs[0]['u']['libelle']." : </h4></u>";

if (!empty($annoncesType)) {

    echo "<table class='table table-striped' style='width: auto;'>";

    echo "<tr>
        <th>Titre</th>
        <th>Annonce posté le</th>
        <th>Expire le</th>
        <th>Temps requis</th>

        <th>Annonceur</th>

        <th>Type d'annonce</th>
    </tr>";

    for ($i = 0; $i < count($annoncesType); $i++) {
        ?>

        <tr">
        <td>
            <a href="<?php echo $this->Html->url('/', true) . "annonces/view/" . $annoncesType[$i]['a']['id']; ?>"><?php echo $annoncesType[$i]['a']['titre']; ?></a>
        </td>
        <td><?php echo date("d/m/Y", strtotime($annoncesType[$i]['a']['date_post'])); ?></td>
        <td><?php echo date("d/m/Y", strtotime($annoncesType[$i]['a']['date_limite'])); ?></td>
        <td><?php echo $annoncesType[$i]['a']['temps_requis']; ?></td>

        <td><?php echo $annoncesType[$i]['u']['username']; ?></td>

        <td><?php echo $annoncesType[$i]['t']['libelle']; ?></td>
        </tr>

        <?php
    }

    echo "</table>";
}

} else {
    if($prefs == NULL) {
        echo "<b>Vous n'avez pas enregistrer de préférences !</b>";
    }else{
        echo "<b>Aucunes annonces disponibles</b>";
    }
}
exit();