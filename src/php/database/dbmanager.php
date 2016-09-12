<?php
require_once('php/constants.php');
require_once(MYSQL_CONNECT);
require_once('table-managers/User.php');

Class DBManager {
	private $dbname;
	private $table_users;
	private $table_user_roles;
	private $table_user_types;
	private $table_employee_types;

	private $conn;

	public function __construct() {
		mysqli_report(MYSQLI_REPORT_ERROR);

		$this->db_name 					= 'smoelenboek';
		$this->table_users 				= 'users';
		$this->table_user_roles 		= 'user_roles';
		$this->table_user_types 		= 'user_types';
		$this->table_employee_types 	= 'employee_types';

		$this->conn = mysqli_connect(DB_ADDRESS, DB_USER, DB_PASS);

		$this->create_database();

	}

	function create_database() {
		$this->conn->query('CREATE SCHEMA IF NOT EXISTS `' . $this->db_name  . '` DEFAULT CHARACTER SET utf8 ;');

		$this->conn->query('CREATE TABLE IF NOT EXISTS `' . $this->db_name  . '`.`' . $this->table_user_roles . '` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(45) NOT NULL,
		`permissions` INT NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE INDEX `id_UNIQUE` (`id` ASC),
		UNIQUE INDEX `name_UNIQUE` (`name` ASC)
		)');

		$this->conn->query('CREATE TABLE IF NOT EXISTS `' . $this->db_name  . '`.`' . $this->table_employee_types . '` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(45) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE INDEX `id_UNIQUE` (`id` ASC),
		UNIQUE INDEX `name_UNIQUE` (`name` ASC)
		)');

		$this->conn->query('CREATE TABLE IF NOT EXISTS `' . $this->db_name  . '`.`' . $this->table_users . '` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`role_id` INT NOT NULL,
		`email` VARCHAR(50) NOT NULL,
		`google_sub` VARCHAR(50) NULL,
		`permissions` INT NULL,
		`firstname` VARCHAR(45) NOT NULL,
		`lastname_prefix` VARCHAR(20) NULL,
		`lastname` VARCHAR(45) NOT NULL,
		`photo_path` VARCHAR(260) NULL,
		`description` TEXT NULL,
		PRIMARY KEY (`id`),
		UNIQUE INDEX `id_UNIQUE` (`id` ASC),
		UNIQUE INDEX `username_UNIQUE` (`email` ASC),
		INDEX `role_idx` (`role_id` ASC),
		CONSTRAINT `role`
			FOREIGN KEY (`role_id`)
			REFERENCES `' . $this->db_name  . '`.`' . $this->table_user_roles . '` (`id`)
		)');

		$this->conn->query('CREATE TABLE IF NOT EXISTS `' . $this->db_name  . '`.`' . $this->table_user_types . '` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`user_id` INT NOT NULL,
		`employee_id` INT NOT NULL,
		PRIMARY KEY (`id`),
		INDEX `user_idx` (`user_id` ASC),
		INDEX `type_idx` (`employee_id` ASC),
		CONSTRAINT `user`
			FOREIGN KEY (`user_id`)
			REFERENCES `' . $this->db_name  . '`.`' . $this->table_users  . '` (`id`),
		CONSTRAINT `type`
			FOREIGN KEY (`employee_id`)
			REFERENCES `' . $this->db_name  . '`.`' . $this->table_employee_types . '` (`id`)
		)');

		$this->conn->select_db($this->db_name);
	}

	/**Add Functions**/
	public function add_user($role_id, $email, $google_sub, $firstname, $lastname_prefix, $lastname, $description, $photo_path = null) {
		try {
			$query = $this->conn->prepare('INSERT INTO `' . $this->table_users .
				'` (`role_id`, `email`, `google_sub`, `firstname`, `lastname_prefix`, `lastname`, `description`, `photo_path`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
			$query->bind_param('isssssss', $role_id, $email, $google_sub, $firstname, $lastname_prefix, $lastname, $description, $photo_path);
			$query->execute();
		} catch(Exception $e) {
			return $e->getCode();
		}
		return true;
	}

	public function delete_user($id) {
		try {
			$query = $this->conn->prepare( 'DELETE FROM ' . $this->table_users . ' WHERE id=?' );
			$query->bind_param('s', $id);
			if($query->execute()) {
				echo 'User successfully deleted!';
			}
		}
		catch(Exception $e) {
			return $e->getCode();
		}
	}

	/**Get Functions**/
	public function get_users() {
		$result = $this->conn->query( 'SELECT * FROM '. $this->table_users);
		$users = array();

		while ( $row = $result->fetch_assoc() ) {
			array_push($users, new User( $row['id'], $row['role_id'], $row['email'], $row['google_sub'],
					$row['firstname'], $row['lastname_prefix'], $row['lastname'], $row['photo_path'], $row['description']) );
		}

		return $users;
	}

	public function update_user($user) {
		$query = $this->conn->prepare('UPDATE ' . $this->table_users . ' SET `role_id`=?, `email`=?, `google_sub`=?,
			`firstname`=?, `lastname_prefix`=?, `lastname`=?, `photo_path`=?, `description`=? WHERE `id`=?');

		$query->bind_param('isssssssi', $user->get_role_id(), $user->get_email(), $user->get_google_sub(),
			 $user->get_firstname(), $user->get_lastname_prefix(), $user->get_lastname(), $user->get_photo_path(), $user->get_description(), $user->get_id() );
		$query->execute();
	}

	public function get_user_by_google_id($sub) {
		$query = $this->conn->prepare( 'SELECT * FROM '. $this->table_users . ' WHERE `google_sub`=?' );
		$query->bind_param('s', $sub);
		$query->execute();

		$result = $query->get_result();
		$row = $result->fetch_assoc();

		if ( $row != null ) {
			return new User( $row['id'], $row['role_id'], $row['email'], $row['google_sub'],
					$row['firstname'], $row['lastname_prefix'], $row['lastname'], $row['photo_path'], $row['description']);
		}

		return false;
	}

	public function get_user_by_email($email) {
		$query = $this->conn->prepare( 'SELECT * FROM '. $this->table_users . ' WHERE `google_sub` IS NULL AND `email`=?' );
		$query->bind_param('s', $email);
		$query->execute();

		$result = $query->get_result();
		$row = $result->fetch_assoc();

		if ( $row != null ) {
			return new User( $row['id'], $row['role_id'], $row['email'], $row['google_sub'],
					$row['firstname'], $row['lastname_prefix'], $row['lastname'], $row['photo_path'], $row['description']);
		}

		return false;
	}


}

