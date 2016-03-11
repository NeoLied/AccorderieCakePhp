<?php
//Configure::write('debug', 2);
if(isset($_POST['last']) || isset($_POST['favType'])){
    if(isset($_POST['last'])){
        if($_POST['last'] == "on"){
            $_SESSION['last'] = 1;
        }
    }else{
        $_SESSION['last'] = 0;
    }

    echo '<meta http-equiv="refresh" content="0; url='.$this->Html->url("/", true)."users/prefs/".AuthComponent::user('id')."/".$_SESSION['last']."/".$_POST['favType'].'" />';
    echo $this->Html->image('loading2.gif', array('alt' => 'Chargement'));
}else{
    echo $this->Html->image('loading2.gif', array('alt' => 'Chargement'));
    echo '<meta http-equiv="refresh" content="0; url='.$this->Html->url("/", true).'" />';
}
?>