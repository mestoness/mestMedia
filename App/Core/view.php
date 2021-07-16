<?php
class View
{
  private function layoutRender($name, $data = [])
  {
    ob_start();

    extract($data);
    require APP_DIR . '/View/' . strtolower($name) . 'View.php';
    $text = ob_get_contents();
    ob_end_clean();
    return $text;
  }
  public function viewRender($name, $layout = null, $data = [],)
  {

    if ($layout != null)
    {
      $VIEW = $this->layoutRender($name, $data);
      require (APP_DIR . '/Layout/' . $layout . 'Layout.php');
    }
    else
    {
      extract($data);
  require APP_DIR . '/View/' . strtolower($name) . 'View.php';
    }

  }
}
?>
