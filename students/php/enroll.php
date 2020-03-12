<?php 
      //get the data from the client  
      $firstN = $_POST['firstN'];
      $lastN= $_POST['lastN'];
      $photo= $_POST['userpic'];
      $DOB= $_POST['DOB'];  
      $date= $_POST['date'];  
      $current= $_POST['current'];  
      $homePhone= $_POST['homePhone'];   
      $mobile= $_POST['mobile']; 
      $emial= $_POST['emial']; 
      $firstContact= $_POST['firstContact']; 
      $firstPhone= $_POST['firstPhone']; 
      $secondContact= $_POST['secondContact']; 
      $secondPhone= $_POST['secondPhone']; 
    
      //the length of the first name legal
      if(!(strlen($firstN)>=5&&strlen($firstN)<=12))
       {
            $str='first name length is not illega';
       }

      // usename is repeated input?
       $dbc=mysqli_connect("127.0.0.1","root","123456","enroll");
       $userNameSQL = "select * from enroll where firstN = '$firstN'";
       $resultSet = mysqli_query($dbc,$userNameSQL);
        if (mysqli_num_rows($resultSet) > 0) {
       $str="firstN exit";
      }

      //connect MYSQL
      $con=mysqli_connect("127.0.0.1","root","123456","enroll");
       if (!$con) {
        exit('fail to connect ');
      }

      //insert data
      $sql = "INSERT INTO enroll(firstN,lastN,photo,DOB,date1,current,homePhone,mobile,emial,firstContact,firstPhone,secondContact,secondPhone) VALUES ('$firstN','$lastN','$photo','$DOB','$date','$current','$homePhone','$mobile','$emial','$firstContact','$firstPhone','$secondContact','$secondPhone')";

       $data = mysqli_query($con,$sql);
       if (!$data) {
              # code...
              exit('sql query fail');
            }
      //locate to index.html
      header('Location:../index.html');  

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <div>
    <?php echo $str; ?>
  </div>
</body>
</html>


