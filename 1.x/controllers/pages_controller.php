<?php
  class PagesController {
    public function home() {
      $first_name = 'Hasan';
      $last_name  = 'Tanushaj';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>
