<?php
Class User implements JsonSerializable{

    private $id;
    private $role_id;
	private $email;
	private $google_sub;
	private $firstname;
	private $lastname_prefix;
	private $lastname;
	private $photo_path;
	private $description;

    public function __construct($id, $role_id, $email, $google_sub, $firstname, $lastname_prefix, $lastname, $photo_path, $description) {
    $this->id = $id;
    $this->role_id = $role_id;
	$this->email = $email;
	$this->google_sub = $google_sub;
	$this->firstname = $firstname;
	$this->lastname_prefix = $lastname_prefix;
	$this->lastname = $lastname;
	$this->photo_path = $photo_path;
	$this->description = $description;
    }

    public function get_id() {
        return $this->id;
    }

	public function set_role_id($role_id) {
		$this->role_id = $role_id;
	}

	public function get_role_id() {
        return $this->role_id;
    }

	public function set_email($email) {
		$this->email = $email;
	}

	public function get_email() {
        return $this->email;
    }

	public function set_google_sub($google_sub) {
		$this->google_sub = $google_sub;
	}

	public function get_google_sub() {
        return $this->google_sub;
    }

	public function set_firstname($firstname) {
		$this->firstname = firstname;
	}

	public function get_firstname() {
        return $this->firstname;
    }

	public function set_lastname_prefix($lastname_prefix) {
		$this->lastname_prefix = $lastname_prefix;
	}

	public function get_lastname_prefix() {
        return $this->lastname_prefix;
    }

	public function set_lastname($lastname) {
		$this->lastname = $lastname;
	}

	public function get_lastname() {
        return $this->lastname;
    }

	public function get_fullname() {
		return $this->firstname . " " . $this->lastname_prefix . " " . $this->lastname;
	}

	public function set_photo_path($photo_path) {
		$this->photo_path = $photo_path;
	}

	public function get_photo_path() {
        return $this->photo_path;
    }

	public function set_description($description) {
		$this->description = $description;
	}

	public function get_description() {
        return $this->description;
    }

	public function jsonSerialize() {
		$array['fullname'] = $this->get_fullname();
    $array['email'] = $this->email;
    $array['description'] = $this->description;
		return $array;
	}
}
