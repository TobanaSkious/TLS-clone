<?php 

Class User 
{
	private $DB;

	public function __construct()
	{
		$this->DB = new Database;
	}

	public function getUsers($email,$password)
	{
		$arr['email'] = $email;
		$arr['password'] = $password;
		$query = "SELECT * FROM users WHERE EMAIL = :email && PASSWORD = :password LIMIT 1";
		$data = $this->DB->read($query,$arr);
		if(!$data)
		{
			return 0;
		}
		return 1;
	}

	public function addUsers($username,$email,$password)
	{
		$arr['username'] = $username;
		$arr['email'] = $email;
		$arr['password'] = $password;
		$query = "INSERT INTO users (USERNAME,PASSWORD,EMAIL) values (:username,:password,:email)";
		$data = $this->DB->read($query,$arr);
	}

	




}