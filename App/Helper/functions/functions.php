<?php
function filterURL($str)
{

  return htmlspecialchars(strip_tags(trim($str)));
}
function layoutExtend($name)
{
  require APP_DIR . "/Layout/" . $name . "Extend.php";
}
function componentsAdd($name)
{
  require APP_DIR . "/View/components/" . $name . ".php";
}
function jsAlert($text)
{
  $alert = "<script>alert('" . $text . "')</script>";
  return $alert;
}
function assetsURL($name)
{

  echo $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/" . BASE_PROJECT . "assets/" . $name;
}
function site_URL()
{
  return $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/" . BASE_PROJECT;
}
/*function get($name)
{
  if (isset($_GET[$name]))
  {

    if (is_array($_GET[$name]))
    {
      return array_map(function ($item)
      {
        return filterURL($item);
      }
      , $_GET[$name]);
    }
    else
    {
      return filterURL($_GET[$name]);
    }

  }
  return false;
}*/
function post_get($name)
{
  if (isset($_POST[$name])) {

    if (is_array($_POST[$name])) {
      return array_map(
        function ($item) {
          return filterURL($item);
        },
        $_POST[$name]
      );
    } else {
      return filterURL($_POST[$name]);
    }
  } else {
    return false;
  }
}
function gets($name)
{
  if (isset($_GET[$name])) {

    if (is_array($_GET[$name])) {
      return array_map(
        function ($item) {
          return filterURL($item);
        },
        $_GET[$name]
      );
    } else {
      return filterURL($_GET[$name]);
    }
  } else {
    return false;
  }
}
function calcTimeSpan($time, $search = array(), $langFile = array())
{
  $varReturn = array();
  $varSecondsAgo = (time() - $time);
  if ($varSecondsAgo >= 31536000) {
    $varReturn[] = intval($varSecondsAgo / 31536000) . " Year Ago";
  } elseif ($varSecondsAgo >= 2419200) {
    $varReturn[] = intval($varSecondsAgo / 2419200) . " Month Ago";
  } elseif ($varSecondsAgo >= 86400) {
    $varReturn[] = intval($varSecondsAgo / 86400) . " Day Ago";
  } elseif ($varSecondsAgo >= 3600) {
    $varReturn[] = intval($varSecondsAgo / 3600) . " Hour Ago";
  } elseif ($varSecondsAgo >= 60) {
    $varReturn[] = intval($varSecondsAgo / 60) . " Minute Ago";
  } else {
    $varReturn[] = "Just Now";
  }
  return str_replace($search, $langFile, $varReturn)[0];
}
function dateToAgo($time)
{

  $xxx = explode("|", $time);
  $saat = explode(":", $xxx[0]);
  $ayYıl = array_map(function ($item) {
    return replaceSpace($item);
  }, explode(".", $xxx[1]));


  $dataaa = DateTime::createFromFormat(
    'H:i d.m.Y',
    "$saat[0]:$saat[1] $ayYıl[0].$ayYıl[1].$ayYıl[2]"
  )->getTimestamp();
  return $dataaa;
}
function post($name)
{
  if (isset($_POST[$name])) {
    return true;
  } else {
    return false;
  }
}

function session($name)
{
  if (isset($_SESSION[$name])) {
    return $_SESSION[$name];
  } else {
    return false;
  }
}

function tokenGen()
{
  $data = base64_encode(uniqid(rand(0000, 9999)) . date('d.m.Y H:i:s') . uniqid(rand(9999, 99999)) . md5(uniqid(uniqid())) . base64_encode(rand(9999, 9999) . uniqid()) . date('d.m.Y H:i:s')) . sha1(uniqid()) . sha1(rand(9999, 5555));
  return $data;
}

function uniqIDgen()
{
  return sha1(base64_encode(uniqid(rand(000, 999)) . date('d.m.Y H:i:s') . uniqid()));
}
function replaceSpace($string)
{
  $string = preg_replace("/\s+/", " ", $string);
  $string = trim($string);
  return $string;
}


function arrayFilterUsername($username,$arr){
  if ($arr == $username) {
    return false;
  }
  else {
    return true;
  }
}