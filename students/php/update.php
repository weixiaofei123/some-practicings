<?php 

	//edit the click student and update
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
      // var_dump($query);
   		while ($row=mysqli_fetch_assoc($query)) {
   			
   			$arrayTotal[]=$row;
   		}

   		$sql1 = "DELETE FROM enroll WHERE firstN = '$firstN' AND lastN = '$lastN' AND current = '$schoolYear'";
    
     	$retval = mysqli_query( $connect, $sql1);
   		
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="./enroll.php" method="post" >
			First Name:<input type="text" name="firstN" value=<?php  echo $arrayTotal[0]['firstN'] ?> autofocus required placeholder=""/><br /><br />
			Last Name:<input type="text" name="lastN" value=<?php  echo $arrayTotal[0]['lastN']?> autofocus required placeholder=""/><br /><br />
			Photo:<input type="file" name="userpic" multiple accept="image/*" value=<?php  echo $arrayTotal[0]['photo']?> /><br /><br />
			D.O.B:<input type="date" name="date" value=<?php  echo $arrayTotal[0]['DOB']?> /><br /><br />
			Enrolment Date:<input type="date" name="date" value=<?php  echo $arrayTotal[0]['date1']?> /><br /><br />
			Current School Year:<input type="number" name="current" value=<?php  echo $arrayTotal[0]['current'] ?> /><br /><br />
			Home Phone:<input type="text" name="homePhone" value=<?php  echo $arrayTotal[0]['homePhone']?>>
			mobile:<input type="text" name="mobile" value=<?php  echo $arrayTotal[0]['mobile']?>>
			Email:<input type="email" name="email"  value=<?php  echo $arrayTotal[0]['emial']?>/><br /> <br />
			First Contact Name:<input type="text" name="firstContact" value=<?php  echo $arrayTotal[0]['firstContact']?>>
			First Contact Phone:<input type="number" name="firstPhone" value=<?php  echo $arrayTotal[0]['firstPhone']?>>
			Second Contact Name:<input type="text" name="secondContact" value=<?php  echo $arrayTotal[0]['secondContact']?>>
			Second Contact Phone:<input type="number" name="secondPhone" value=<?php  echo $arrayTotal[0]['secondPhone']?>>
			<input type="submit" value="enroll" />
	</form>
</body>
</html>