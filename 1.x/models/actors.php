<?php
  class MovieCast {
    public $movie_id;
    public $person_id;
    public $character_name;
    public $gender_id;
    public $cast_order;


    public function __construct($movie_id,$person_id, $character_name, $gender_id, $cast_order) {
      $this->movie_id      = $movie_id;
      $this->person_id      = $person_id;
      $this->character_name   = $character_name;
      $this->gender_id    = $gender_id;
      $this->cast_order     = $cast_order;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM movie_cast');
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $movie_id) {
        $list[] = new MovieCast($movie_id['movie_id'], $movie_id['person_id'], $movie_id['character_name'], $movie_id['gender_id'], $movie_id['cast_order']);
      }

      return $list;
    }

    public static function find($movie_id) {
      $db = Db::getInstance();
      $movie_id = intval($movie_id);
      $req = $db->prepare('SELECT * FROM movie_cast WHERE movie_id= :movie_id');
      $req->execute(array('movie_id' => $movie_id));
      $movie_Cast = $req->fetch();

      return new MovieCast($movie_Cast['movie_id'],$movie_Cast['person_id'], $movie_Cast['character_name'], $movie_Cast['gender_id'], $movie_Cast['cast_order']);
    }

    public static function insertMovieCast($movie_id,$person_id, $character_name, $gender_id, $cast_order) {
      $db = Db::getInstance();
      $movie_id = intval($movie_id);
      $person_id = intval($person_id);
      $character_name = intval($character_name);
      $gender_id = intval($gender_id);
      $cast_order = intval($cast_order);
      $sql="INSERT INTO movie_cast ($movie_id,$person_id, $character_name, $gender_id, $cast_order)
      VALUES ('$movie_id', '$person_id', '$character_name', '$gender_id',$cast_order)";
      $db->query($sql);
    }

    public static function updateMovieCast($oD,$person_id,$character_name,$gender_id,$cast_order) {
      $db = Db::getInstance();
      $movie_id = intval($movie_id);
      $person_id = intval($person_id);
      $character_name = intval($character_name);
      $gender_id = intval($gender_id);
      $cast_order = intval($cast_order);
      $sql="UPDATE movie_cast SET person_id = '$person_id', character_name='$character_name', gender_id = '$gender_id', cast_oder =$cast_order
       WHERE movie_id = '$movie_id ";
      $db->query($sql);
    }

  	public static function deleteMovieCast($movie_id) {
      $db = Db::getInstance();
      $sql="DELETE FROM movie_cast WHERE movie_id = '$movie_id'";
	    $db->query($sql);
		}
  }
?>