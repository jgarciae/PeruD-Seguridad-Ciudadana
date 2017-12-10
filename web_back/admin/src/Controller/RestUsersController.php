<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

class RestUsersController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['signin']);
        $this->loadModel('Users');
    }

    public function signin(){
        $user = $this->Users->find('all', ['conditions' => ['Users.dni' => $this->request->data['dni']]])->first();
                                                              
        if ($user) {
            $status = '200';
            $message = 'Ok';
        }else{
            $status = '401';
            $message = 'Unauthorized';
        }
        
        $this->set([
            'status' => $status,
            'message' => $message,
            'user' => $user,
            '_serialize' => ['status', 'message', 'user']
        ]);
    }
}