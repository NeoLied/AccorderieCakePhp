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
		
		<?php echo $this->Html->image('header-maquette.png', array('alt' => 'Header de bogoss')); ?>
		
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
        						<li><a href="#">Rechercher</a></li>
      						</ul>
    					</li>
    					
    					<li>
      						<a href="#">Mon profil</a>
      						<ul>
        						<li><?php echo $this->Html->link('Editer','/users/edit/'.AuthComponent::user('id')); ?></li>
        						
      						</ul>
    					</li>
				
						<li><a href="#">Nous contacter</a></li>
					</ul>
				</nav>
			<?php
		}
	?>	
		
		
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
			
		<div id="footer">
			Nous finirons tous dans le Valhalla, pour servir le divin Krom !!!
		</div>
	</div>
	
</body>
</html>
