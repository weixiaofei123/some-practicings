<?php 
     
     $firstN=$_GET['firstN'];
     $lastN=$_GET['lastN'];
     $schoolYear=$_GET['schoolYear'];

     $connect=mysqli_connect('127.0.0.1','root','123456','enroll');
     if (!$connect) {
      exit('fail to connect');
     }
     //delete the click info
     $sql = "DELETE FROM enroll WHERE firstN = '$firstN' AND lastN = '$lastN' AND current = '$schoolYear'";
     $retval = mysqli_query( $connect, $sql);
    
      if(! $retval )
      {
        echo "fail";
      }
      //get the other info
      $sql1 = "SELECT * FROM enroll";
   		$query=mysqli_query($connect,$sql);
   		while ($row=mysqli_fetch_assoc($query)) {
   			$arrayTotal[]=$row;
   		}

   		$arrayRes=json_encode($arrayTotal);
   		echo $arrayRes;
      header("location:../view.html")


 ?>
