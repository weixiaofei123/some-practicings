<?php 
     
     $connect=mysqli_connect('127.0.0.1','root','123456','enroll');
     if (!$connect) {
     	# code...
     	exit('连接数据库失败');
     }
     //get all the students info
   		$query=mysqli_query($connect,"SELECT * FROM enroll");
      // var_dump($query);
   		while ($row=mysqli_fetch_assoc($query)) {
   			# code...
   			$arrayTotal[]=$row;
   		}

   		
   		$arrayRes=json_encode($arrayTotal);
   		echo $arrayRes;


 ?>
