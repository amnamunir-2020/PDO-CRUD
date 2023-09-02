<?php  

session_start();

include('dbconfig.php');






//insert
if(isset($_POST['submit'])){


    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone_no=$_POST['phone'];

   $query="insert into user_tb (name,email,password,phone) values(:nameuser ,:emailuser , :passworduser, :phoneuser)";
   $preapre=$conn->prepare($query);
 

   $preapre->bindParam(':nameuser', $name,PDO::PARAM_STR);
   $preapre->bindParam(':emailuser',$email,PDO::PARAM_STR);
   $preapre->bindParam(':passworduser',$password,PDO::PARAM_STR);
   $preapre->bindParam(':phoneuser',$phone_no,PDO::PARAM_STR);


   //bind value in array format variable data
//    $data=[
//     ':name'=>$name,
//     ':email '=>$email,
//     ':password'=>$password,
//     ':phone'=>$phone_no
//    ];

  

    //print_r($data);
    //die();


    $preapre->execute();

  if(  $preapre){
     
    $_SESSION['message']="Insert Successfully";
    header('Location:index.php');
    exit(0);

  }
  
  else{
    $_SESSION['message']="Not Insert Data!";
    header('Location:index.php');
    exit(0);
  }


}



//update

if(isset($_POST['update'])){

  $nameid=$_POST['user_id'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $phoneno=$_POST['phone'];

try {

  $updatequery="UPDATE user_tb SET  name=:username , email=:useremail, password=:userpassword, phone=:userphone WHERE id=:idofuser  LIMIT 1";

   $check=$conn->prepare($updatequery);

   $check->bindParam(':username', $name,PDO::PARAM_STR);
   $check->bindParam(':useremail',$email,PDO::PARAM_STR);
   $check->bindParam(':userpassword',$password,PDO::PARAM_STR);
   $check->bindParam(':userphone',$phoneno,PDO::PARAM_STR);
   $check->bindParam(':idofuser',$nameid,PDO::PARAM_INT);
   $result=$check->execute();

    
   if($result){
    $_SESSION['message']="Update Successfully";
    header('Location:index.php');
    exit(0);

   } 

   else{

    $_SESSION['message']="Not Update!";
    header('Location:index.php');
    exit(0);


   }

}

catch (PDOException  $e)
{
echo $e->getMessage();
}



}



//delete
if(isset($_POST['delete'])){
  $userid=$_POST['delete'];

  try{
    
    $deletequery="DELETE FROM  user_tb WHERE id=:userid";            //bind the user id
    $del=$conn->prepare($deletequery);
    $del->bindParam(':userid',$userid,PDO::PARAM_INT);

    $deleted=$del->execute();


    if($deleted){
      $_SESSION['message']="Delete Data!";
      header('Location:index.php');
      exit(0);
    }


    else{
      $_SESSION['message']="Not Delete Data!";
    header('Location:index.php');
    exit(0);
    }



  }

  catch(PDOException $e) {
 echo $e->getMesage();
  }

}












?>