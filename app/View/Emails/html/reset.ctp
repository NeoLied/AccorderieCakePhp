Bonjour,
<br/><br/>
Une demande de réinisialisation de mot de passe du compte <u><?php echo $dataForView['username']; ?></u> inscrit sur le site <strong><?php echo $this->Html->link('La Marmite', $this->Html->url('/', true)); ?></strong>
<br/><br/>
Cliquez sur ce lien pour recevoir un nouveau mot de passe : <strong><?php echo $this->Html->link('Réinisialisation mon mot de passe', $this->Html->url('/users/reset/'. $dataForView['id'] ."-". md5($dataForView['password']), true)); ?></strong>
<br/><br/>
Merci de ne pas répondre à ce mail.