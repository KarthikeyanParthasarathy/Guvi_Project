<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	function get_data() {
		$name = $_POST['firstname'];
		$file_name='userdata'. '.json';

    if(file_exists("$file_name")) {
			$current_data=file_get_contents("$file_name");
			$array_data=json_decode($current_data, true);


      $extra=array(
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'dob' => $_POST['dob'],
        'gender' =>$_POST['gender'],
        'number' =>$_POST['number'],
        'mail' =>$_POST['mail'],
        'pwd' =>$_POST['pwd'],
        'conpwd' =>$_POST['conpwd'],
      );
      $array_data[]=$extra;

      return json_encode($array_data);
    }
    else {
			$datae=array();
			$datae[]=array(
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'dob' => $_POST['dob'],
        'gender' =>$_POST['gender'],
        'number' =>$_POST['number'],
        'mail' =>$_POST['mail'],
        'pwd' =>$_POST['pwd'],
        'conpwd' =>$_POST['conpwd'],
			);
			echo "file not exist<br/>";
			return json_encode($datae);
		}
	}
  $file_name='userdata'. '.json';
  if(file_put_contents("$file_name", get_data())) {

  		echo '';
  	}
  	else {
  		echo 'There is some error';
  	}
}

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$number=$_POST['number'];
$mail=$_POST['mail'];
$pwd=$_POST['pwd'];
$conpwd=$_POST['conpwd'];

$conn=new mysqli("localhost","root","","userdb");
echo "jg";
if($conn->connect_error)
{
  die('Connection Failed :'.$conn->connect_error);

}
else{
  $stmt =$conn->prepare("insert into detail(firstname,lastname,dob,gender,number,mail,pwd,conpwd)
  values(?,?,?,?,?,?,?,?)");
  $stmt->bind_param("ssssssss",$firstname,$lastname,$dob,$gender,$number,$mail,$pwd,$conpwd);
    $stmt->execute();
	
  $stmt->close();
  $conn->close();
}

 ?>
