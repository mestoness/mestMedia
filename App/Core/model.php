<?php
class Model
{

  protected $db;
  
  public function __construct(){
  
  $this->db = new basicdb("localhost","mestmedia","root","");
  

}

}
