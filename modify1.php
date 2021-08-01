<?php


    session_start();
$ip_add=getenv("REMOTE_ADDR");
include "connect.php";
echo "connected";
mysqli_set_charset($con,"utf8mb4_generic_ci");
$phone=$_POST['phone'];
    $innn=$_POST['iname'];
    $ic=$_POST['icode'];
    $cn=$_POST['cname'];
    $cc=$_POST['ccode'];
    echo $innn;
    $id=$_POST['id'];
    $rf=$_POST['routef'];
    $re=$_POST['routee'];
    $v=$_POST['via'];
    $a=$_POST['add'];
    $ci=$_POST['city'];
    $p=$_POST['pincode'];
    $aa=$_POST['aadhar'];
$today = date("Y-m-d");
$ef = date('Y-m-d', strtotime("+3 months", strtotime($today)));
echo "in middle1";
$sql="UPDATE data SET InstituteName = ? ,Institutecode = ? ,CourseName = ? ,Coursecode = ? ,AdmissionNo = ? ,Routef = ? ,Routeend = ? ,Via = ? ,Addresss = ? ,City = ? ,Pincode = ? ,Phone = ? WHERE Aadhar = ?";
echo $sql;
//mysqli_query($con,"INSERT INTO data(InstituteName,Institutecode,CourseName,Coursecode,AdmissionNo,Routef,Routeend,Via,Addresss,City,Pincode,Aadhar,Phone) VALUES ('$in','$ic','$cn','$cc','$id','$rf','$re','$v','$a','$ci','$p','$aa','$phone')");
if($stmtkt=mysqli_prepare($con,$sql))//"INSERT INTO data(InstituteName,Institutecode,CourseName,Coursecode,AdmissionNo,Routef,Routeend,Via,Addresss,City,Pincode,Aadhar,Phone) VALUES ('innn','y','y','i','u','5','5','3','12','3','5','123123123123','557452')"))
{
   
    mysqli_stmt_bind_param($stmtkt,'sssssssssssss',$innn,$ic,$cn,$cc,$id,$rf,$re,$v,$a,$ci,$p,$phone,$aa);
    
    mysqli_stmt_execute($stmtkt);
    echo mysqli_affected_rows($con);
    echo "Entered";
}
else{
    echo "error";
}
?>