<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller 
{
    var $components = array('Cookie','Session');
    var $uses = array('User');
    
    var $curUser;
    
    function beforeFilter()
    {
        parent::beforeFilter();
        if (strpos($this->action, 'admin_') !== false)
        {
            $this->layout = 'admin';
            $this->checkLogin();
        }
    }
    
    /* Check user is login or not */
    function checkLogin()
    {
        $userInfo = $this->Session->read('UserInfo');
        if(isset($userInfo))
        {
            $this->curUser = $userInfo;
        }
        else
        {
            $userKey = $this->Cookie->read('UserKey');
            if(isset($userKey))
            {
                $user = $this->User->find('first',array('conditions'=>array('User.login_key'=>$userKey)));
                if(!empty($user))
                {
                    $this->curUser = $user['User'];
                }
                else
                {
                    $this->Session->write('RedirectUrl',$_SERVER['REDIRECT_URL']);
                    $this->redirect(array('controller'=>'users','action'=>'login','admin'=>0));
                }
            }
            else
            {
                $this->Session->write('RedirectUrl',$_SERVER['REDIRECT_URL']);
                $this->redirect(array('controller'=>'users','action'=>'login','admin'=>0));
            }
        }
        
        // => Is Login
                
        //$this->checkAuth();
        $this->getTopMenu();
        $this->set('curUser',$this->curUser);
    }
    
    function getTopMenu()
    {
        $this->loadModel('Menu');
        $listParent = $this->Menu->find('all',array('conditions'=>array('Menu.group'=>$this->curUser['group'],'Menu.parent_id'=>null,'Menu.display'=>true),'order'=>array('Menu.display_order')));
        
        $topMenu = array();
        foreach($listParent as $item)
        {
            $parentID = $item['Menu']['id'];
            $listChild = $this->Menu->find('all',array('conditions'=>array('Menu.parent_id'=>$parentID,'Menu.display'=>true),'order'=>array('Menu.display_order')));
            array_push($topMenu,array('MainMenu'=>$item,'SubMenu'=>$listChild));
        }
        $this->set('topMenu',$topMenu);
    }
    
    
    
    # sets up successful session flash message for view
    function flashSuccess($msg, $url = null)
    {
        $this->Session->setFlash($msg, 'flash'.DS.'success');
        if (!empty($url))
        {
            $this->redirect($url, null, true);
        }
    }

    # sets up warning session flash message for view
    function flashWarning($msg, $url = null)
    {
        $this->Session->setFlash($msg, 'flash'.DS.'warning');
        if (!empty($url))
        {
            $this->redirect($url, null, true);
        }
    }

    # sets up information session flash message for view
    function flashInfo($msg, $url = null)
    {
        $this->Session->setFlash($msg, 'flash'.DS.'info');
        if (!empty($url))
        {
            $this->redirect($url, null, true);
        }
    }

    # sets up successful session flash message for view
    function flashError($msg, $url = null)
    {
        $this->Session->setFlash($msg, 'flash'.DS.'error');
        if (!empty($url))
        {
            $this->redirect($url, null, true);
        }
    }
    
}
