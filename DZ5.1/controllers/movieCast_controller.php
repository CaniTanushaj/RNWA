<?php
  class MovieCast {
    public function index() {
      // we store all the posts in a variable
      $movie_cast = MovieCast::all();
      require_once('views/movieCast/index.php');
    }
  
    public function verifyinsert(){
      require_once('views/movieCast/insert.php');
    }
  //$movie_id,$person_id, $character_name, $gender_id, $cast_order
    public function insertMovieCast()
    {
      MovieCast::insertMovieCast($_POST['movie_id'],$_POST['person_id'],$_POST['character_name'],$_POST['gender_id'],$POST['cast_order']);
     return call('movieCast', 'index');
    }
  
  public function verifyupdate()
  {
    if (!isset($_GET['movie_id']))
          return call('pages', 'error');
    $movie_cast = Movie_Cast::find($_GET['movie_id']);
    require_once('views/movieCast/update.php');
  }

  public function updateMovieCast()
  {
    if (!isset($_POST['movie_id']))
      return call('pages', 'error');
   Movie_Cast::updateMovieCast($_POST['movie_id'],$_POST['person_id'],$_POST['character_name'],$_POST['gender_id'],$_POST['cast_order']);
   return call('movie_cast', 'index');
  }

	public function delete() {
      if (!isset($_GET['movie_id']))
        return call('pages', 'error');
      Movie_Cast::delete($_GET['movie_id']);
      return call('movie_id', 'index');
    }

    public function verifydelete(){
      if (!isset($_GET['oD']))
          return call('pages', 'error');
          require_once('views/movieCast/delete.php');
      }
  }
 ?>