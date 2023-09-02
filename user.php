<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Add </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>




<section>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">

<div class="mt-3 mb-3"><a href="index.php" class="btn btn-dark " >Back</a></div>

<h2>Add New User</h2>

<form action="code.php"  method="post" class="mt-5">
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
</form>

</div>
</div>
</section>


    
</body>
</html>