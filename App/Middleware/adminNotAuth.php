<?php
class adminNotAuth
{
    public function handle($next)
    {
        if (isset($_SESSION["oturum"]))
        {
            $modelUsers = new users;
            $query = $modelUsers->loginUser($_SESSION["oturum"]["username"], $_SESSION["oturum"]["password"]);
            if ($query)
            {
                if (count($query) === 1)
                {
          if ($_SESSION["oturum"]["username"] == $query[0]["username"] && $_SESSION["oturum"]["password"] == $query[0]["password"])
                    {
                        header("location:./");
                        die();
                    }

                }

            }

        }
        
        return $next;
    }
}

?>
