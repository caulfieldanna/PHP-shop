<?php

namespace Course\Shop\Models;

use Sky\Frame\DB;

class GoodsModel 
{
	private $db;
	private $tablename = 'goods';

	public function __construct()
	{
		$this->db = DB::getInstance();
	}

	// public function getAllGoods() {
	// 	$sql = "SELECT * FROM goods";
	// 	$data = $this->db->selectAllFromTable($sql);
	// 	return $data;
	// }
	    public function getAllGoods() {
        $sql = "SELECT * FROM $this->tablename";
        $data = $this->db->selectAllFromTable($sql);
        return $data;
    }

	public function getGoodById($good_id) {
		$sql = "SELECT * FROM $this->tablename WHERE id = :id";
		$params = [
			'id' => $good_id
		];
		$data = $this->db->selectByParams($sql, $params);
		return $data;
	}

	public function addGood(array $good_data) {
		//$sql = "SELECT * FROM $this->tablename WHERE article = :article";
		$sql = "SELECT count FROM $this->tablename WHERE article = :article";
		$param = [
		'article' => $good_data['article']
		];
		$result = $this->db->selectByParams($sql, $param); // false or ['count' => ]
		if ($result) { // если товар существует, увеличиваем количество
			$update_sql = "UPDATE $this->tablename SET count = :count WHERE article = :article";
			$update_param = [
				'count' => (int)$result['count'] + (int)$good_data['count'],
				'article' => $good_data['article']
			];
			return $this->db->insertIntoTable($update_sql, $update_param);
		}

		//если товар не существует - добавляем новый
		// названия столбцов такие же и в том же порядке как и в таблице
		$new_sql = "INSERT INTO $this->tablename (title, description, preview, price, count, article) 
			VALUES (:title, :description, :preview, :price, :count, :article)";
		$good_data['count'] = (int)$good_data['count'];
		return $this->db->insertIntoTable($new_sql, $good_data);
	}
}

?>
<!-- CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `id_user` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `avatar` VARCHAR(45) NOT NULL,
  `start_session` DATETIME NOT NULL,
  `name_idname` INT NOT NULL,
  PRIMARY KEY (`id_user`),
  INDEX `fk_user_name1_idx` (`name_idname` ASC),
  CONSTRAINT `fk_user_name1`
    FOREIGN KEY (`name_idname`)
    REFERENCES `mydb`.`name` (`idname`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB -->

<!-- CREATE TABLE IF NOT EXISTS `mydb`.`user` (  `id_user` INT NOT NULL,  `name` VARCHAR(45) NOT NULL,  `login` VARCHAR(45) NOT NULL,  `password` VARCHAR(45) NOT NULL,  `email` VARCHAR(45) NOT NULL,  `avatar` VARCHAR(45) NOT NULL,  `start_session` DATETIME NOT NULL,  `name_idname` INT NOT NULL,  PRIMARY KEY (`id_user`),  INDEX `fk_user_name1_idx` (`name_idname` ASC),  CONSTRAINT `fk_user_name1`    FOREIGN KEY (`name_idname`)    REFERENCES `mydb`.`name` (`idname`)    ON DELETE NO ACTION    ON UPDATE NO ACTION) -->