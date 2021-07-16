<?php
class adminAuth
{
  public function handle($next)
  {
    if (session("oturum") && isset($_SESSION["oturum"]["username"]) && isset($_SESSION["oturum"]["password"]))
    {
      $modelUsers = new users;
      $query = $modelUsers->loginUser($_SESSION["oturum"]["username"], $_SESSION["oturum"]["password"]);
      if ($query)
      {
        if (count($query) === 1)
        {

          if ($_SESSION["oturum"]["username"] != $query[0]["username"] && $_SESSION["oturum"]["password"] != $query[0]["password"])
          {
            header("location:login");
            die();
          }

        }
        else
        {
          header("location:login");
          die();

        }
      }

    }
    else
    {
      header("location:login");
      die();
    }
    return $next;
  }
}

?>
