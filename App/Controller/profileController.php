<?php

class profile extends Controller
{
    public function index($username)
    {
        $model = self::model("profileC");


        self::viewRender("profile", "main", [
            "user_data" => $model->profilDataGet($username),
            "session_data" => $model->profilDataGet($_SESSION["oturum"]["username"]),
            "post_data"=>$model->profileToPost($username)
        ]);
    }
    public function post($username)
    {
        if (post("user_follow")) {
            $model = self::model("profileC");
            $profileData = $model->profilDataGet($_SESSION["oturum"]["username"]);
            $xx = array_filter(explode(",", $profileData[0]["followed"]));
            if (!in_array($username, $xx)) {
                array_push($xx, $username);
            }
            $liste = "";
            for ($i = 0; $i < count($xx); $i++) {
                if (count($xx) == 1) {
                    $liste .= $xx[$i];
                } else if (count($xx) == $i + 1) {
                    $liste .= $xx[$i];
                } else {
                    $liste .= $xx[$i] . ",";
                }
            }
            $model->updateProfileFollowed($_SESSION["oturum"]["username"], $liste);
            header("Refresh:0");
        }
        if (post("user_unf")) {
            $model = self::model("profileC");
            $profileData = $model->profilDataGet($_SESSION["oturum"]["username"]);
            $xxx = array_filter(explode(",", $profileData[0]["followed"]));
            if (in_array($username, $xxx)) {
                $xx = array_diff($xxx, array($username));
            } else {
                $xx = $xxx;
            }
            $liste = "";
            for ($i = 0; $i < count($xx); $i++) {
                if (count($xx) == 1) {
                    $liste .= $xx[$i];
                } else if (count($xx) == $i + 1) {
                    $liste .= $xx[$i];
                } else {
                    $liste .= $xx[$i] . ",";
                }
            }
            $model->updateProfileFollowed($_SESSION["oturum"]["username"], $liste);
            header("Refresh:0");
        }
    }
}
