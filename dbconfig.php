<?php

$dbname='mysql:host=localhost; dbname=crud_db';
$dbusername="root";
$dbpassword="";


//handling
try{

    $conn=new PDO( $dbname,$dbusername,$dbpassword);
    //echo "Connection Success";
   


}


catch(PDOException $e){                                                 

    echo "Connection Failed" .$e->getMessage();                    //error message
}




?>