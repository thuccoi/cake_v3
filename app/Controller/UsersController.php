<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController 
{
    function admin_home()
    {
        $group = $this->User->getListGroup();
        $this->set('group',$group);
    }
    
    function login() 
    {
        // Check is login => redirect
        $userKey = $this->Session->read('UserInfo');
        if(isset($userKey))
        {
            // redirect
            //$this->login_redirect($user);
        }
        // ----------------
        
        $this->layout = null;
        if($this->request->is('post')) 
        {
            $username = $this->request->data['User']['username'];
            $password = sha1($this->request->data['User']['password']);            
            $user = $this->User->find('first',array('conditions'=>array('User.username'=>$username,'User.password'=>$password)));
                                
            if(!empty($user))
            {
                if($user['User']['active'])
                {
                    // Create login key
                    $loginTime = date("Y-m-d H:i:s");
                    $loginKey = $user['User']['id'] . "key" . $loginTime;
                    $loginKey = sha1($loginKey);                
                    // ----------------
                    
                    // update login info
                    $this->User->updateAll(array('User.login_last'=>"'$loginTime'",'User.login_key'=>"'$loginKey'",'User.login_count'=>$user['User']['login_count'] + 1),array('User.id'=>$user['User']['id']));
                    
                    // if 'remember me' checked, save cookie
                    if(isset($this->request->data['User']['remember']))
                    {
                        $this->Cookie->write('UserKey', $loginKey, null, '30 days');
                    }
                    else
                    {
                        $this->Cookie->delete('UserKey');
                    }
                    
                    $this->Session->write('UserInfo', $user['User']);
                        
                    // Redirect to previous page
                    $redirectUrl = $this->Session->read('RedirectUrl');
                    if(isset($redirectUrl))
                    {
                        $url = 'http://'.$_SERVER['HTTP_HOST'].$redirectUrl;
                        $this->Session->delete('RedirectUrl');
                        $this->redirect($url);
                    }
                        
                    // Redirect base on group
                    if($user['User']['group'] == GROUP_ADMIN)
                    {
                        $this->redirect(array('controller'=>'users','action'=>'home','admin'=>true));
                    }
                    else
                    {
                        debug('Config redirect here!');
                    }
                }
                else
                {
                    $this->flashError(__('MsgUserDisactive', true));
                    $this->redirect($this->referer());
                }
            }
            else
            {
                $this->flashError(__('MsgLoginFail', true));
                $this->redirect($this->referer());
            }
        }
    }
    
    function logout() 
    {
        $this->Session->delete('UserInfo');
        $this->Cookie->delete('UserKey');
        $this->redirect(array('controller'=>'users','action'=>'login','admin'=>0));
    }
    
    
	public function admin_index() 
    {
        //$this->paginate = array('User' => array('limit' => 3));
        $users = $this->paginate('User');        
        
        $groups = $this->User->getListGroup();
        $this->set(compact('groups','users'));
	}

	public function admin_add() 
    {
		if ($this->request->is('post')) 
        {
            if(!$this->checkUserValid($this->request->data))
            {
                $groups = $this->User->getListGroup();
                $this->set('groups',$groups);
                return;
            }
            
			$this->User->create();
            $this->request->data['User']['password'] = sha1($this->request->data['User']['password']);
			if ($this->User->save($this->request->data)) 
            {
				$this->flashSuccess('MsgUserSaved');
				$this->redirect(array('action' => 'index'));
			} 
            else 
            {
                $this->flashError('MsgUserNotSaved');
			}
		}
        
        $groups = $this->User->getListGroup();
        $this->set('groups',$groups);
	}

	public function admin_edit($id = null) 
    {
		if (!$this->User->exists($id)) 
        {
			throw new NotFoundException(__('InvalidUser'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->User->save($this->request->data)) 
            {
				$this->flashSuccess('MsgUserSaved');
				$this->redirect(array('action' => 'index'));
			} 
            else 
            {
				$this->flashError('MsgUserNotSaved');
			}
		} 
        else 
        {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
        
        $groups = $this->User->getListGroup();
        $this->set('groups',$groups);
	}
    
    function admin_reset_password($id)
    {
        if(!$this->User->exists($id) || $id == SYSTEM_ID)
        {
            // Not allow reset password of SystemID
            $this->redirect(array('action'=>'index'));
        }
        
        if($this->request->is('post') || $this->request->is('put'))
        {
            $error = 0;
            if(strlen($this->data['User']['newpassword']) < 8)
            {
                $this->flashError(__('MsgPasswordLength', true));
                ++$error;
            }
            else
            {
                if($this->data['User']['newpassword'] != $this->data['User']['confirmpassword'])
                {
                    $this->flashError(__('MsgConfirmPasswordInvalid', true));
                    ++$error;
                }
            }
                
            if($error == 0)
            {
                $this->User->id = $id;
                $this->User->saveField('password',sha1($this->data['User']['newpassword']));
                $this->flashSuccess(__('MsgResetPasswordSuccess',true));
                $this->redirect(array('controller'=>'users','action'=>'index'));
            }            
        }
        else
        {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }
    
    function admin_profile_password()
    {
        $id = $this->curUser['id'];
        if ($id == null && empty($this->request->data)) 
        {            
            $this->redirect(array('controller'=>'pages','action'=>'index'));
        }
        if($this->request->is('post') || $this->request->is('put'))
        {
            $curPassword = $this->User->field('password',array('User.id'=>$id));
            $error = false;
            if(sha1($this->request->data['User']['oldpassword']) != $curPassword)
            {
                $this->flashWarning(__('MsgOldPasswordInvalid',true));
                $error = true;
            }
            else if(strlen($this->request->data['User']['newpassword']) < 8)
            {
                $this->flashWarning(__('MsgPasswordLength',true));
                $error = true;
            }
            else if($this->request->data['User']['newpassword'] != $this->request->data['User']['confirmpassword'])
            {
                $this->flashWarning(__('MsgConfirmPasswordInvalid',true));
                $error = true;
            }
                            
            if($error == false)
            {
                $this->User->id = $id;
                if($this->User->saveField('password',sha1($this->request->data['User']['newpassword'])))
                {
                    $this->flashSuccess(__('MsgPasswordChanged',true));
                    if($this->curUser['group'] == GROUP_ADMIN)
                    {
                        $this->redirect(array('action'=>'index'));
                    }
                    else
                    {
                        $this->redirect(array('action'=>'profile_edit'));
                    }
                }
            }
        }
    }

	public function admin_delete($id = null) 
    {
		$this->User->id = $id;
		if (!$this->User->exists()) 
        {
			throw new NotFoundException(__('Invalid user'));
		}
        
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) 
        {
            $this->flashSuccess(__('UserDeleted'));
            $this->redirect($this->referer());
		}
        
        $this->flashError(__('UserNotDeleted'));
		$this->redirect($this->referer());
	}
    
    function checkUserValid($data)
    {
        if(empty($data['User']['username']))
        {
            $this->flashError(__('MsgUsernameNotEmpty',true));
            return false;
        }
        
        $user = $this->User->find('first',array('conditions'=>array('User.username'=>$data['User']['username'])));
        if(!empty($user))
        {
            $this->flashError(__('MsgUserExist',true));
            return false;
        }
        
        if(strlen($data['User']['password']) < 8)
        {
            $this->flashError(__('MsgPasswordLength',true));
            return false;
        }        
        return true;
    }
    
    function admin_set_active($id,$bool = true)
    {
        $this->User->id = $id;
        if (!$this->User->exists() || $id == SYSTEM_ID) 
        {
            $this->redirect(array('controller'=>'users','action'=>'index'));
        }
        
        $this->request->onlyAllow('post', 'set_active');
        $this->User->saveField('active',$bool);
        $this->redirect($this->referer());
    }
}
