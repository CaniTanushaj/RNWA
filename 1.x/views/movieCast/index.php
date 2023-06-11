	<div class="container">
	<br>
    <center><h1>Offices</h1></center>
	<br>
  <div class="mb-2">
  <a class="btn btn-primary" href="?controller=movieCast&action=verifyinsert" role="button">Dodaj</a>
  </div>

  <div class="table-responsive"> 
    <table class="table">
        <tr>
            <th>ID Movie</th>
            <th>Person ID</th>
            <th>Character name</th>
            <th>Gender ID/th>
            <th>Cast Order</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($movieCast as $row): ?>
        <tr>
            <td><?php echo $row->movie_id ?></td>
            <td><?php echo $row->person_id ?></td>
            <td><?php echo $row->character_name ?></td>
            <td><?php echo $row->gender_id ?></td>
            <td><?php echo $row->cast_order?></td>
            <td><a href="?controller=movieCast&action=verifyupdate&movie_id=<?php echo $row->orderNumber?>" class="btn btn-primary btn-xs"> Edit</a></td>
            <td><a href="?controller=movieCast&action=verifydelete&movie_id=<?php echo $row->orderNumber?>" class="btn btn-danger btn-xs"> Delete</a></td>

        </tr>
        <?php endforeach ?>
    </table>
	</div>
  </div>
 
    
