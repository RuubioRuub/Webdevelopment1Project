<?php

class Game implements JsonSerializable {

    public function jsonSerialize(): mixed
	{
		return get_object_vars($this);
	}

    private int $gameID;
    private string $title;
    private string $description;
    private string $genre;
    private string $publisher;
    private string $image;
    private ?int $userScore;
    private ?int $criticScore;

    public function getGameID(): int
	{
		return $this->gameID;
	}

	public function setGameID(int $value)
	{
		$this->gameID = $value;
	}
    public function getTitle(): string
	{
		return $this->title;
	}

	public function setTitle(string $value)
	{
		$this->title = $value;
	}
    public function getDescription(): string
	{
		return $this->description;
	}

	public function setDescription(string $value)
	{
		$this->description = $value;
	}
    public function getGenre(): string
	{
		return $this->genre;
	}

	public function setGenre(string $value)
	{
		$this->genre = $value;
	}
    public function getPublisher(): string
	{
		return $this->publisher;
	}

	public function setPublisher(string $value)
	{
		$this->publisher = $value;
	}
    public function getImage(): string
	{
		return $this->image;
	}

	public function setImage(string $value)
	{
		$this->image = $value;
	}
	public function getUserscore(): int
	{
		return $this->userScore;
	}

	public function setUserscore(int $value)
	{
		$this->userScore = $value;
	}
	public function getCriticscore(): int
	{
		return $this->criticScore;
	}

	public function setCriticscore(int $value)
	{
		$this->criticScore = $value;
	}
}

?>