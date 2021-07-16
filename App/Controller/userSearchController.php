<?php

class userSearch extends Controller
{
    public function index()
    {
        $modelUsers = self::model("users");
        self::viewRender("search","main",[
            "search_data" => $modelUsers->userSearch()
        ]);
    }
}
