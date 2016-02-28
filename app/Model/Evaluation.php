<?php

class Evaluation extends AppModel
{
    public $name = 'Evaluation';

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'offreur_id'
        ),
        'Annonce'=>
            array(
                'className' => 'Annonce',
                'foreignKey' =>'annonce_id'
            )
    );

}

?>