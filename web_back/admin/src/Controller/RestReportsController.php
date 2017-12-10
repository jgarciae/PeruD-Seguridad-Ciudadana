<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use CakeMonga\MongoCollection\CollectionRegistry;

class RestReportsController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function beforeFilter(Event $event)
    {
        //$this->Auth->allow(['insert']);
        $this->loadModel('Users');
    }

    public function insert()
    {	
    	$report = $this->request->data;
    	$reportsCollection = CollectionRegistry::get('Reports');
        $row = $reportsCollection->insertTo($report);

        if ($row) {
            $status = '200';
            $message = 'Ok';
        }else{
            $status = '500';
            $message = 'Internal Server Error';
        }

        $this->set([
            'status' => $status,
            'message' => $message,
            '_serialize' => ['status', 'message']
        ]);
    }

    public function generate() 
    {
        $users = $this->Users->find();
        $reportsCollection = CollectionRegistry::get('Reports');
        $row = $reportsCollection->generateReports($users->toArray(), $this->request->data['num'], $this->request->data['last']);

        if ($row) {
            $status = '200';
            $message = 'Ok';
        }else{
            $status = '500';
            $message = 'Internal Server Error';
        }

        $this->set([
            'status' => $status,
            'message' => $message,
            '_serialize' => ['status', 'message']
        ]);
    }
}