<?php
$sername="localhost";
$username="root";
$password="";
$db="sample";
$con=mysqli_connect($sername,$username,$password,$db);
if(!$con)
{
    die("Connection failed".mysqli_connect_error());
}
session_start();
$ip_add=getenv("REMOTE_ADDR");


    $u=mysqli_real_escape_string($con,$_POST["username"]);
    $p=mysqli_real_escape_string($con,$_POST["password"]);
    
    $sql="SELECT username from logintable where username='$u' and pass='$p'";
    $r=mysqli_query($con,$sql);
   // $y=mysqli_result($r,0,'username');
    $m=mysqli_num_rows($r);
  //"INSERT INTO data(InstituteName,Institutecode,CourseName,Coursecode,AdmissionNo,Routef,Routeend,Via,Addresss,City,Pincode,Aadhar,Phone) VALUES ('$innn','y','y','i','u','5','5','3','12','3','5','123123123123','557452')"  
    if($m==1)
    {
        
        $_SESSION["login_user"]=$u;
        header("location: home1.php");
        echo "Entered";
    }
    

else{
    echo $m;
   // header("location: logininv.html");
    echo "Invalid";
}


/*$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
}*/

?>
<html>
    <body>
        <form method="post" action="">
        <tr><td>Username<input type="text" name="username"></td></tr>
        <tr><td>Password<input type="text" name="password"></td></tr>
        <tr><td>Submit<input type="submit" name="Login" ></td></tr>
        </form>
        </body>
</html>