<?php
App::uses('Sanitize', 'Utility');
App::uses('CakeEmail', 'Network/Email');
class ContactsController extends AppController
{
	var $components = array('Email');

 	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('*');
	}


	function index()
	{
		$this->layout = 'pages';
		$this->set('title_for_layout', 'Contact');

		if(!empty($this->request->data))
		{
			$this->Contact->create($this->request->data);
 
			if(!$this->Contact->validates())
			{
				$this->Session->setFlash("Veuillez corriger les erreurs mentionnées.", 'flash_pb');
				$this->validateErrors($this->Contact);
			}
			else 
			{
				$message = 'Message de contact de : '.$this->request->data['Contact']['nom'].', '.$this->request->data['Contact']['email']."\n".$this->request->data['Contact']['message'];

		        $email = new CakeEmail();
		        $email->from($this->request->data['Contact']['email']);
		        $email->bcc($this->request->data['Contact']['email']);
		        $email->to('contact@foglo.fr');
		        $email->subject('Formulaire de contact');
		        $email->send($message);

		        $this->Session->setFlash('Formulaire de contact envoyé. Nous tachons de vous répondre rapidement.', 'flash_ok');
			}
		}
	}
}