<?php
require_once('php/constants.php');
require_once(MYSQL_CONNECT);

Class DBManager {
	private $dbname;
	private $table_users;
	private $table_user_roles;
	private $table_user_types;
	private $table_employee_types;

	private $conn;

	public function __construct() {
		$this->dbname 					= 'smoelenboek';
		$this->table_users 				= 'users';
		$this->table_user_roles 		= 'user_roles';
		$this->table_user_types 		= 'user_types';
		$this->table_employee_types 	= 'employee_types';

		$this->conn = mysqli_connect(DB_ADDRESS, DB_USER, DB_PASS);

		$this->create_database();

	}

	function create_database() {
		$this->conn->query('CREATE SCHEMA IF NOT EXISTS `' . $this->dbname  . '` DEFAULT CHARACTER SET utf8 ;');

		$this->conn->query('CREATE TABLE IF NOT EXISTS `' . $this->dbname  . '`.`' . $this->table_users . '` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`role_id` INT NOT NULL,
		`email` VARCHAR(50) NOT NULL,
		`google_sub` VARCHAR(50) NOT NULL,
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
			REFERENCES `' . $this->dbname  . '`.`' . $this->table_user_roles . '` (`id`)
		)');

		$this->conn->query('CREATE TABLE IF NOT EXISTS `' . $this->dbname  . '`.`' . $this->table_user_roles . '` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(45) NOT NULL,
		`permissions` INT NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE INDEX `id_UNIQUE` (`id` ASC),
		UNIQUE INDEX `name_UNIQUE` (`name` ASC)
		)');

		$this->conn->query('CREATE TABLE IF NOT EXISTS `' . $this->dbname  . '`.`' . $this->table_employee_types . '` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(45) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE INDEX `id_UNIQUE` (`id` ASC),
		UNIQUE INDEX `name_UNIQUE` (`name` ASC)
		)');

		$this->conn->query('CREATE TABLE IF NOT EXISTS `' . $this->dbname  . '`.`' . $this->table_user_types . '` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`user_id` INT NOT NULL,
		`employee_id` INT NOT NULL,
		PRIMARY KEY (`id`),
		INDEX `user_idx` (`user_id` ASC),
		INDEX `type_idx` (`employee_id` ASC),
		CONSTRAINT `user`
			FOREIGN KEY (`user_id`)
			REFERENCES `' . $this->dbname  . '`.`' . $this->table_users  . '` (`id`),
		CONSTRAINT `type`
			FOREIGN KEY (`employee_id`)
			REFERENCES `' . $this->dbname  . '`.`' . $this->table_employee_types . '` (`id`)
		)');
	}
	function add_user($role_id, $email, $google_sub, $firstname, $lastname, $description, $lastname_prefix = null){
		$query = $this->conn->prepare("INSERT INTO ". $this->table_users.
			"(role_id, email, google_sub, firstname, lastname_prefix, lastname, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$query->execute(array($role_id, $email, $google_sub, $firstname, $lastname_prefix, $lastname, $description));
	}
}

