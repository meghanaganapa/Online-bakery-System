<?php

    session_start();
$ip_add=getenv("REMOTE_ADDR");
include "connect.php";
echo "connected";
$fn=$_POST['fname'];
$ln=$_POST['lname'];
$ffn=$_POST['ffname'];
$fln=$_POST['flname'];
$dob=$_POST['dob'];
$phone=$_POST['phone'];
$email=$_POST['mail'];
$dg=$_POST['dropdowng'];
$c=$_POST['code'];
$dp=$_POST['dropdown'];
$ic=$_POST['icode'];
$innn=$_POST['iname'];
$cc=$_POST['ccode'];
$cn=$_POST['cname'];
$id=$_POST['id'];
$rf=$_POST['routef'];
$re=$_POST['routee'];
$v=$_POST['via'];
$a=$_POST['add'];
$ci=$_POST['city'];
$p=$_POST['pincode'];
$aa=$_POST['aadhar'];
$today = date("Y-m-d");


$filename= $_FILES['fileupload']['name'];
$filetype=$_FILES['fileupload']['type'];
$filesize=$_FILES['fileupload']['size'];
$fileloc=$_FILES['fileupload']['tmp_name'];
$filestore="buspass/".$filename;

move_uploaded_file($fileloc,$filestore);
$imagetmp=base64_encode(file_get_contents($filestore));


//Get the content of the image and then add slashes to it 
//$imagetmp=addslashes(file_get_contents($_FILES['fileupload']['tmp_name']));

echo "in middle";
$ef = date('Y-m-d', strtotime("+3 months", strtotime($today)));
echo "in middle1";
//$sql=;


echo "in middle2";
$sql="INSERT INTO data(Categories,Firstname,Lastname,FatherFirstName,FatherLastName,DateofBirth,Email,Gender,BusPassCode,InstituteName,Institutecode,CourseName,Coursecode,AdmissionNo,Routef,Routeend,Via,Addresss,City,Pincode,Bonafide,Aadhar,Phone,Applydate,Expirydate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
if($stmutt=mysqli_prepare($con,$sql))//"INSERT INTO data(InstituteName,Institutecode,CourseName,Coursecode,AdmissionNo,Routef,Routeend,Via,Addresss,City,Pincode,Aadhar,Phone) VALUES ('$innn','y','y','i','u','5','5','3','12','3','5','123123123123','557452')"))
{
  
    mysqli_stmt_bind_param($stmutt,"sssssssssssssssssssssssss",$dp,$fn,$ln,$ffn,$fln,$dob,$email,$dg,$c,$innn,$ic,$cn,$cc,$id,$rf,$re,$v,$a,$ci,$p,$imagetmp,$aa,$phone,$today,$ef);
    
    mysqli_stmt_execute($stmutt);
    echo mysqli_affected_rows($con);
    echo "Entered";}
else{
    echo "error";
}
?>