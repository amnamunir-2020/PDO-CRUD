<?php include('dbconfig.php');


session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home -PDO CRUD</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>


<section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

        <?php     if(isset($_SESSION['message'])):             ?>

         <div class="alert alert-success"> <?= $_SESSION['message'];    ?> </div>
      
        
         <?php   unset($_SESSION['message']);   endif;     ?>






        <div class="mt-5">
<a href="user.php" class="btn btn-info float-end" > Add  Student</a>
</div>



<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE NUMBER</th>
      <th scope="col">EDIT</th>
      <th scope="col">DELETE</th>
    </tr>
  </thead>
  <tbody>
  
<?php 
$selectquery="select * from user_tb";
$statement=$conn->prepare($selectquery);
$statement->execute();

$result=$statement->fetchAll(PDO::FETCH_OBJ);               //data in object                               //data get in associative form  $row['name'] data fetch  other format with view other formatbi fetchobj $row->id..
if($result){


    foreach($result as $row){
  ?>
  <tr>
    <td><?= $row->id  ?></td>                                    
    <td><?=  $row->name  ?></td>
    <td><?=  $row->email  ?></td>
    <td><?=  $row->phone  ?></td>

    <td>
    <a href="edit-user.php?id= <?=$row->id;   ?>" class="btn btn-primary">Edit  </a>
    </td>

    <td>
      <form action ="code.php" method="POST"> 
        <button type="submit" name="delete" value="<?= $row->id ?>" class="btn btn-danger">Delete</button>

    </form>

    </td>


    
   
  </tr>

  <?php 
    }
    
}

else
{
?>
  <tr>
  <td> Data Not Found!</td>

  </tr>
<?php

}

?>





  </tbody>
</table>








<!--<form action="code.php"  method="post" class="mt-5">
  <div class="form-group">
    <label >Name</label>
    <input type="text" class="form-control"  name="name"  required >
    
  </div>

  
  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control" name="email"  required >
  </div>

   
  <div class="form-group">
    <label >Phone No</label>
    <input type="text" class="form-control" name="phone"  required>
  </div>



  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" name="password"  required >
  </div>

  
 

  
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>-->



</div>



</div>
</div>
</section>
    
</body>
</html>