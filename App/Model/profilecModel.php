<?php

class profileC extends Model
{
    public function profilDataGet($username)
    {
        return $this->db->from("users")
            ->where("username", $username)
            ->all();
    }

    public function updateProfileFollowed($username, $list)
    {
        return $this->db->update("users")
            ->where("username", $username)
            ->set([
                "followed" => $list
            ]);
    }
    public function profileToPost($username)
    {
        return $this->db->from("post")
            ->where("owner", $username)
            ->limit(0, 10)
            ->orderBy("id", "DESC")
            ->all();
    }
    public function profileToPostLimit($username, $id)
    {
        return $this->db->from("post")
            ->where("owner", $username)
            ->limit($id, 10)
            ->orderBy("id", "DESC")
            ->all();
    }
}
