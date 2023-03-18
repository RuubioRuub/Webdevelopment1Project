<?php

class Review implements JsonSerializable{

	public function jsonSerialize() : mixed
    {
        return get_object_vars($this);
    }

    private string $title;
    private string $writer;
    private string $company;
    private int $score;
    private string $body;
    private bool $criticreview;
    private int $gameID;
    private int $reviewID;

	public function getTitle() : string {
		return $this->title;
	}

	public function setTitle(string $value) {
		$this->title = $value;
	}

	public function getWriter() : string {
		return $this->writer;
	}

	public function setWriter(string $value) {
		$this->writer = $value;
	}

	public function getCompany() : string {
		return $this->company;
	}

	public function setCompany(string $value) {
		$this->company = $value;
	}

	public function getScore() : int {
		return $this->score;
	}

	public function setScore(int $value) {
		$this->score = $value;
	}

	public function getBody() : string {
		return $this->body;
	}

	public function setBody(string $value) {
		$this->body = $value;
	}

	public function getCriticreview() : bool {
		return $this->criticreview;
	}

	public function setCriticreview(bool $value) {
		$this->criticreview = $value;
	}

	public function getGameID() : int {
		return $this->gameID;
	}

	public function setGameID(int $value) {
		$this->gameID = $value;
	}

	public function getReviewID() : int {
		return $this->reviewID;
	}

	public function setReviewID(int $value) {
		$this->reviewID = $value;
	}
}