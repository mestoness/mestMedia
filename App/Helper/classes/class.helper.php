<?php
class Helper
{

    public static function load()
    {
        $helperDir = realpath(".") . "\app\Helper/functions";
        if ($dh = opendir($helperDir))
        {
            while ($file = readdir($dh))
            {
                if (is_file($helperDir . "/" . $file))
                {
                    require $helperDir . "/" . $file;
                }
            }
        }

    }
}
?>