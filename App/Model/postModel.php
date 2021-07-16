<?php

class post extends Model
{

    public function getAllPost()
    {
        $usersİnfo = $this->db->from("users")
            ->where("password", $_SESSION["oturum"]["password"])
            ->where("username", $_SESSION["oturum"]["username"])
            ->all();
        $takipEdilenler = explode(",", $usersİnfo[0]["followed"]);
        array_push($takipEdilenler, $_SESSION["oturum"]["username"]);
        return $this->db->from('post')
            ->orderby('id', 'DESC')
            ->in("owner", $takipEdilenler)
            ->limit(0, 10)
            ->all();
    }
    public function addPost($owner, $content, $date)
    {
        return $this->db->insert('post')
            ->set([
                'owner' => $owner,
                'content' => $content,
                'date' => $date,
                "uniq" => uniqIDgen()
            ]);
    }
    public function getLimitPost($id)
    {
        return $this->db->from('post')
            ->orderby('id', 'DESC')
            ->limit($id, 10)
            ->all();
    }
    public function postPage($id, $uniq)
    {
        return $this->db->from("post")
            ->where("id", $id)
            ->where("uniq", $uniq)
            ->first();
    }
    public function addComment($id, $uniq, $content, $date, $username)
    {
        return $this->db->insert('comments')
            ->set([
                'username' => $username,
                'content' => $content,
                'date' => $date,
                "uniq" => $uniq,
                "sef_id" => $id
            ]);
    }
    public function getPostComments($uniq, $id)
    {
        return $this->db->from("comments")
            ->where("sef_id", $id)
            ->where("uniq", $uniq)
            ->orderBy("id", "DESC")
            ->limit(0, 10)
            ->all();
    }
    public function limitComments($limitId, $uniq, $id)
    {
        return $this->db->from("comments")
            ->where("sef_id", $id)
            ->where("uniq", $uniq)
            ->orderBy("id", "DESC")
            ->limit($limitId, 10)
            ->all();
    }
}
