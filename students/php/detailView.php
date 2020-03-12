<?php 
     

     $firstN=$_GET['firstN'];
     $lastN=$_GET['lastN'];
     $schoolYear=$_GET['schoolYear'];
     $connect=mysqli_connect('127.0.0.1','root','123456','enroll');
     if (!$connect) {
     	# code...
     	exit('fail to connect');
     }

      $sql = "SELECT * FROM enroll WHERE firstN = '$firstN' AND lastN = '$lastN' AND current = '$schoolYear'";

   		$query=mysqli_query($connect,$sql);
   		while ($row=mysqli_fetch_assoc($query)) {
   			
   			$arrayTotal[]=$row;
   		}
      
   		$arrayRes=json_encode($arrayTotal);
   		echo $arrayRes;


 ?>
