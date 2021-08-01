<?php


session_start();
$ip_add=getenv("REMOTE_ADDR");
include "connect.php";
echo "connected";

$today = date("Y-m-d");
$ef = date('Y-m-d', strtotime("+3 months", strtotime($today)));
echo "in middle1";
$sql="INSERT INTO data(InstituteName,Institutecode,CourseName,Coursecode,AdmissionNo,Routef,Routeend,Via,Addresss,City,Pincode,Aadhar,Phone) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
//mysqli_query($con,"INSERT INTO data(InstituteName,Institutecode,CourseName,Coursecode,AdmissionNo,Routef,Routeend,Via,Addresss,City,Pincode,Aadhar,Phone) VALUES ('$in','$ic','$cn','$cc','$id','$rf','$re','$v','$a','$ci','$p','$aa','$phone')");
if($stmtt=mysqli_prepare($con,$sql))//"INSERT INTO data(InstituteName,Institutecode,CourseName,Coursecode,AdmissionNo,Routef,Routeend,Via,Addresss,City,Pincode,Aadhar,Phone) VALUES ('$innn','y','y','i','u','5','5','3','12','3','5','123123123123','557452')"))
{
    $phone=$_REQUEST['phone'];
    $innn=$_REQUEST['iname'];
    $ic=$_REQUEST['icode'];
    $cn=$_REQUEST['cname'];
    $cc=$_REQUEST['ccode'];
    echo $innn;
    $id=$_REQUEST['id'];
    $rf=$_REQUEST['routef'];
    $re=$_REQUEST['routee'];
    $v=$_REQUEST['via'];
    $a=$_REQUEST['add'];
    $ci=$_REQUEST['city'];
    $p=$_REQUEST['pincode'];
    $aa=$_REQUEST['aadhar'];
    mysqli_stmt_bind_param($stmtt,"sssssssssssss",$innn,$ic,$cn,$cc,$id,$rf,$re,$v,$a,$ci,$p,$aa,$phone);
    
    mysqli_stmt_execute($stmtt);
    echo "Entered";
}
else{
    echo "error";
}
?>