<?php

class users extends Model
{

	public function loginUser($username, $password)
	{
		return $this->db->from('users')
			->where("password", $password)
			->where("username", $username)
			->all();
	}
	public function userSearch()
	{
		$id = gets("s");
		if (strlen(replaceSpace($id)) > 2) {
			return $this->db->from('users')
				->like('username', "{$id}%")
				->all();
		}
	}
}
