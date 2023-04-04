<?php 
class User {
	private int $userID;
	private string $username;
	private string $password;
	private bool $criticacount;
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

	public function getCriticacount(): string
	{
		return $this->criticacount;
	}

	public function setCriticacount(string $value)
	{
		$this->criticacount = $value;
	}
	public function getCompany(): string
	{
		return $this->company;
	}

	public function setTitle(string $value)
	{
		$this->company = $value;
	}
} 