<?php 
class User implements JsonSerializable {

	public function jsonSerialize(): mixed
	{
		return get_object_vars($this);
	}

	private int $userID;
	private string $username;
	private string $password;
	private string $email;
	private string $role;
	private bool $criticaccount;
	private ?string $company;

	public function getUserID(): string
	{
		return $this->userID;
	}

	public function setUserID(string $value)
	{
		$this->userID = $value;
	}
	public function getUsername(): string
	{
		return $this->username;
	}

	public function setUsername(string $value)
	{
		$this->username = $value;
	}
	public function getPassword(): string
	{
		return $this->password;
	}

	public function setPassword(string $value)
	{
		$this->password = $value;
	}

	public function getCriticaccount(): bool
	{
		return $this->criticaccount;
	}

	public function setCriticaccount(bool $value)
	{
		$this->criticaccount = $value;
	}
	public function getCompany(): string
	{
		return $this->company;
	}

	public function setCompany(string $value)
	{
		$this->company = $value;
	}
	public function getEmail(): string
	{
		return $this->email;
	}

	public function setEmail(string $value)
	{
		$this->email = $value;
	}
	public function getRole(): string
	{
		return $this->role;
	}

	public function setRole(string $value)
	{
		$this->role = $value;
	}
} 