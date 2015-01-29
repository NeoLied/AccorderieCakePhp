<!-- Fichier : /app/View/Utilisateurs/view.ctp -->

<h1>ID : <?php echo h($user['User']['id']); ?></h1>

<p>Login : <?php echo h($user['User']['username']); ?></p>

<p>Nom : <?php echo $user['User']['nom']; ?></small></p>

<p>Prenom : <?php echo h($user['User']['prenom']); ?></p>