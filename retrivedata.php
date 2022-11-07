<?php
$mail=$_POST['mail'];
$pwd=$_POST['pwd'];
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "userdb";


   $conn = new mysqli($servername,$username,$password,$dbname);


    if ($conn -> connect_errno)
    {
       echo "Failed to connect to MySQL: " . $conn -> connect_error;
       exit();
    }

    $sql = "select * from detail";
    $result = ($conn->query($sql));

    $row = $result->fetch_array(MYSQLI_ASSOC);




    if ($result->num_rows > 0)
    {

        if($row["pwd"]=== $pwd)
        {
          header("Location: profile.html");
          exit();
        }
        else{
          echo "Invalid Email and password....";
        }
    }
?>
