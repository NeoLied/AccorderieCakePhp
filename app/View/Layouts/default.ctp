<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo ("La Marmite"); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('ourCss');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

	<div id="container">
		
		<?php echo $this->Html->image('header-maquette.png', array('alt' => 'Header')); ?>
		
		<?php	if(AuthComponent::user('id') == null)
		{
			?>
				<nav>
					<ul>
						<li><?php echo $this->Html->link('Accueil','/'); ?></li>
						<li><?php echo $this->Html->link('Inscription','/users/add'); ?></li>
						<li><?php echo $this->Html->link('Connexion','/users/login'); ?></li>
						<li><a href="#">Nous contacter</a></li>
					</ul>
				</nav>
			<?php
		}
		else
		{
			?>
				<nav>
					<ul>
						<li><?php echo $this->Html->link('Accueil','/'); ?></li>

						<li>
      						<a href="#">Annonces</a>
      						<ul>
        						<li><?php echo $this->Html->link('Ajouter','/annonces/add'); ?></li>
        						<li><?php echo $this->Html->link('Demandes','/annonces/demande'); ?></li>
        						<li><?php echo $this->Html->link('Offres','/annonces/offre'); ?></li>
        						<li><?php echo $this->Html->link('Mes annonces','/annonces/mes_annonces'); ?></li>
        						<li><?php echo $this->Html->link('Rechercher','/annonces/'); ?></li>
      						</ul>
    					</li>
    					
    					<li>
      						<a href="#">Mon profil</a>
      						<ul>
        						<li><?php echo $this->Html->link('Editer','/users/edit/'.AuthComponent::user('id')); ?></li>
        						<li><?php echo $this->Html->link('Mon Historique','/annonces/mon_historique'); ?></li>
        						<li><?php echo $this->Html->link('Déconnexion','/users/logout'); ?></li>
      						</ul>
    					</li>
				
						<li><a href="#">Nous contacter</a></li>
			<?php
		}
		if(AuthComponent::user('role') == "admin") { ?>
						<li>
      						<a href="#">Administration</a>
      						<ul>
        						<li><?php echo $this->Html->link('Liste utilisateurs','/users/'); ?></li>
        						<li><?php echo $this->Html->link('Liste annonces','/annonces/'); ?></li>
        						<li><?php echo $this->Html->link('Annonces à valider','/annonces/annonce_pas_valide/'); ?></li>
      						</ul>
    					</li>
<?php	} ?>	
					<div class="cadre_credit_temps">
					<?php
						if(AuthComponent::user('id') != null) {
							echo $utilisateur[0]['users']['credit_temps']." Heures";
						}
					?>
					</div>
					</ul>
					
					
					
					
				</nav>
		
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
			
		<div id="footer">
			Copyright <?php echo "&copy;".date('Y'); ?> La Marmite. Tous droits réservés.
		</div>
	</div>
	
</body>
</html>
