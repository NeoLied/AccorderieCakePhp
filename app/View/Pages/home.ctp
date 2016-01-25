<div id="home" style="width:60%; text-align:justify;" class="container-fluid">

    <div id="static" style="width:60%; text-align:justify;" class="<?php if(AuthComponent::user('id') != null) echo 'hide'; ?>">

        <h1>Bienvenue Visiteur !</h1>
        <p><b>Qu’est-ce qu’une accorderie ?</b><br>

            <br>Une accorderie est un système d’échange de services solidaires entre ses membres (« accordeurs »),
            en général habitants d’un même quartier, et destiné à « lutter contre la précarité et la pauvreté,
            favoriser la mixité sociale, aider les gens à prendre conscience de leur capacité à faire, et aider au lien social ».</p>

        <h1>Vous êtes Membres ?</h1>
        <p>Vous avez aussi accès à l’Espace membre, ce qui vous permet de consulter les services offerts,
            de modifier votre profil et vos offres ou demandes de services.</p>

    </div>

    <div id="dynamic" style="width:60%; text-align:justify;" class="<?php if(AuthComponent::user('id') == null) echo 'hide'; ?>">
        <h1>Bienvenue <?php echo AuthComponent::user('username'); ?> !</h1>

    </div>
</div>


