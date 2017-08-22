<?php

namespace Course\Shop\Controllers;
use Sky\Frame\DB;

use Course\Shop\Models\AccountModel;
use Sky\Frame\Controlller;
use Sky\Frame\Session;
 
class AccountModel 
{	
	private $tablename = 'users';
	private $db;

	public function __construst()
	{
		$this->db = DB::getInstance();
	}

	public function userAdded($reg_data)
	{
		//добавление нового пользователя в базу
		//users = id, login, pwd, email, avatar, role
		$sql = "SELECT login FROM $this->tablename WHERE login =:login";
		$params = [
			'login' => $reg_data['login'];
		];
		$result = $this->db->selectByParams($sql, $params);
		// result либо false (если пользователь не найден), либо login пользователя
		if($result) {
			return false;
		}
		$reg_data['avatar'] = 'default_user.jpg';
		$reg_data['role'] = 'user';
		$reg_data['pwd'] = password_hash($reg_data['pwd'], PASSWORD_DEFAULT);
		$sql_new_user = "INSET INTO $this->tablename (login, pwd, email, avatar) VALUES (:login, :pwd, :email, :avatar)";
		return $this->db->insertIntoTable($sql_new_user, $reg_data);
	}

	// public function login($login_data) {
		
	// }
	public function login($login_data) {
        $sql = "SELECT pwd FROM $this->tablename WHERE login =:login";
        $params = [
            'login' => $login_data['login']
        ];
        $result = $this->db->selectByParams($sql, $params);
        if (!$result) {
            return false;
        }
        // если пароль не hash
//        if ($login_data['pwd'] == $result['pwd']) {
//            return true;
//        }
//        return false;
        if(!password_verify($login_data['pwd'], $result['pwd'])) {
            return false;
        }
        return true;
    }
}

