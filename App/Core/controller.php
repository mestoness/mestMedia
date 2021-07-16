<?php

class Controller extends View
{

    public function model($name)
    {
        return new $name();
    }

}