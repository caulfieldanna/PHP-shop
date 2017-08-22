<?php
namespace Course\Shop\Controllers;

use Course\Shop\Models\AccountModel;

class AccountController extends Controlller
{
	private $account_model;
	private $session;

	public function __construct() 
	{
		$this->account_model = new AccountModel();
		$this->session = Session::getInstance();
	}

	public function registrationAction() {
		регистрация  
		$reg_data = [

		];

		//$reg_data = json_decode($_POST['reg_modal'], true);

		if ($this->account_model->userAdded($reg_data)) {
			return $this->generateAjaxResponse('add user');
		}
		return $this->generateAjaxResponse('add user error');
	}

	public function loginAction() {
		// авторизация
		$login_data = json_decode($_POST['login_data'], true);

		if($this->account_model->login($login_data)) {
			$this->session->setParam('name', $login_data['login']);
			setcookie('name', $login_data['login'], time()+90, '/');
			return $this->generateAjaxResponse('login');
		}
		return $this->generateAjaxResponse('login error');
	}

	public function accountAction() {
		// отображение личного кабинета
		return $this->generateResponse('accoutn.php', 'template.php',[
				'app_title' => 'Личный кабинет',
				'username' => $this->session->getParam('name'),
				'admin' => false //$admin
			]
		);
	}

	public function logoutAction() {
		// выход
		$this->session->stopSession();
		return $this->generateAjaxResponse('logout');
	}
}