<?php
  class PagesController {
    public function home() {
      $first_name = 'Marin';
      $last_name  = 'Zovko';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>