<?php

use Phalcon\Mvc\Model;

class User extends Model
{
	public $roll_no;

	public $u_email;

	public $name;

	public $pass;


	public function getSource()
	{
		return "User";
	}
}
?>