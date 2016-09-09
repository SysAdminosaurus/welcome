<?php
class Page {
  private $_template = null;
  private $_data = null;

  public function __construct($template = null, $data = null)
  {
    $this->_template = $template;
    $this->_data = $data;
  }

  public function setTemplate($templatename) {
    $this->_template = $templatename;
  }

  public function setDataSrc($data) {
    $this->_data = $data;
  }

  public function render() {
    $templateData = $this->_data;
    include_once "Views/partials/header.php";
    require_once  "Views/" . $this->_template .".php";
    include_once "Views/partials/footer.php";
  }

}
