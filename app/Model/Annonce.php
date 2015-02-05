<?php

class Annonce extends AppModel
{
     public $validate = array(
        'titre' => array(
            'rule' => 'notEmpty'
        ),
        'description' => array(
            'rule' => 'notEmpty'
        ),
     	'temps_requis' => array(
     		'rule' => 'notEmpty'
     	)
    );
}

?>