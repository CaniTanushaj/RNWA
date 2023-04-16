<div class="container">
<form action="?controller=movieCast&action=updateorders" methmovie_id="POST">
  <div class="form-group">
    <label for="movie_id">Movie ID:</label>
    <input type="text" readonly class="form-control" name="movie_id" value=<?php echo $movieCast->movie_id?>>
  <div class="form-group">
    <label for="person_id">Person ID:</label>
    <input type="text" readonly class="form-control" name="person_id" value=<?php echo $movieCast->person_id?>>
  </div>
  <div class="form-group">
    <label for="character_name">Character Name:</label>
    <input type="text" class="form-control" name="character_name" value=<?php echo $movieCast->character_name?>>
  </div>
  <div class="form-group">
    <label for="gender_id">Gender ID:</label>
    <input type="text" class="form-control" name="gender_id" value=<?php echo $movieCast->gender_id?>>
  </div>
  <div class="form-group">
    <label for="cast_order">Cast order:</label>
    <input type="text" class="form-control" name="cast_order" value=<?php echo $movieCast->cast_order?>>
  </div>
    <button type="submit" class="btn btn-default">Confirm</button>
</form> 
</div>
