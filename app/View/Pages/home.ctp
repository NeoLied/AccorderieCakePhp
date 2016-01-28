<div id="home" style="width:100%; text-align:center;" class="container-fluid">

    <?php if(AuthComponent::user('id')){ ?>
    <div id="dynamic" style="width:100%; text-align:justify;">
        <h1>Bienvenue <?php echo AuthComponent::user('username'); ?></h1>

    </div>
    <?php }else{ ?>

        <div id="static" style="width:100%; text-align:justify;">

            <h1>Bienvenue Visiteur</h1>
            <br/>
            <h3>Qu’est-ce qu’une accorderie ?</h3><br>

                <p>Une accorderie est un système d’échange de services solidaires entre ses membres (« accordeurs »),
                en général habitants d’un même quartier, et destiné à « lutter contre la précarité et la pauvreté,
                favoriser la mixité sociale, aider les gens à prendre conscience de leur capacité à faire, et aider au lien social ».</p>

            <br/><h2>Vous êtes Membres ?</h2>
            <p>Vous avez aussi accès à l’Espace membre, ce qui vous permet de consulter les services offerts,
                de modifier votre profil et vos offres ou demandes de services.</p>

        </div>

    <?php } ?>
</div>


