<?php
class User {
    private int $id;
    private string $username;
    private string $password;
    private int $roleId;
    private string $email;

	public function getId() : int {
		return $this->id;
	}

	public function setId(int $value) {
		$this->id = $value;
	}

	public function getUsername() : string {
		return $this->username;
	}

	public function setUsername(string $value) {
		$this->username = $value;
	}

	public function getPassword() : string {
		return $this->password;
	}

	public function setPassword(string $value) {
		$this->password = $value;
	}

	public function getRoleId() : int {
		return $this->roleId;
	}

	public function setRoleId(int $value) {
		$this->roleId = $value;
	}

	public function getEmail() : string {
		return $this->email;
	}

	public function setEmail(string $value) {
		$this->email = $value;
	}
}