<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $uses = array('User');
	
	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'login'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
        	'authorize' => array('Controller')
        )
    );
	
	public function isAuthorized($user) {
		// Admin peut accéder à toute action
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}
		// Refus par défaut
		return false;
	}

    public function beforeFilter() {
		$this->Auth->authenticate = array('Form' => array('scope' => array('User.offre_de_bienvenue' => "oui")));
        $this->Auth->allow('index', 'view', 'display');
        if(AuthComponent::user('id') != null) {
       		$query_to_execute = "select credit_temps from users where id = ".AuthComponent::user('id');
        	$results = $this->User->query($query_to_execute);
        	$this->set('utilisateur', $results);
        }
    }
}
