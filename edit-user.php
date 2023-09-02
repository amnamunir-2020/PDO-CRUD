
<?php

include('dbconfig.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>




<section>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">

<div class="mt-3 mb-3"><a href="index.php" class="btn btn-dark " >Back</a></div>

<h2>Edit & Update The Data</h2>

<!-- Fetch the data with the help of id & then edit -->

<?php
if(isset($_GET['id'])){

    $iduser=$_GET['id'];
    $query="select * from user_tb where id=:userid LIMIT 1";
    $st=$conn->prepare($query);
    //$data=[':userid'=> $iduser];

    $st->bindParam(':userid', $iduser,PDO::PARAM_INT);
    $st->execute();

    $result=$st->fetch(PDO::FETCH_OBJ);

}


?>


<form action="code.php"  method="post" class="mt-5">

<input type="hidden" class="form-control"  name="user_id" value="<?=$result->id  ?>"  />

  <div class="form-group">
    <label >Name</label>
    <input type="text" class="form-control"  name="name" value="<?=  $result->name ;  ?>" required >
    
  </div>

  
  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control" name="email" value="<?=  $result->email;  ?>"  required >
  </div>

   
  <div class="form-group">
    <label >Phone No</label>
    <input type="text" class="form-control" name="phone" value="<?=  $result->phone;  ?>"  required>
  </div>



  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" name="password"  value="<?=  $result->password;  ?>" required >
  </div>

  
 

  
  <button type="submit" name="update" class="btn btn-success">Update</button>
</form>

</div>
</div>
</section>


    
</body>
</html>