<?php
 session_start();
 $ip_add=getenv("REMOTE_ADDR");
 include "connect.php";
 echo "connected";
// mysqli_set_charset($con,"utf8mb4_generic_ci");
$dp=$_POST['dropdown'];

$aa=$_POST['aadhar'];
$today = date("Y-m-d");
$fileloc=$_FILES['fileupload']['tmp_name'];
$filename=$_FILES['fileupload']['name'];
$filestore="buspass/".$filename;

//move_uploaded_file($fileloc,$filestore); 

//Get the content of the image and then add slashes to it 
$imagetmp=base64_encode(file_get_contents($_FILES['fileupload']['tmp_name']));

$ef = date('Y-m-d', strtotime("+3 months", strtotime($today)));
echo $aa;
echo gettype($today);
echo gettype($ef);


$sql="UPDATE data SET Categories=?, Bonafide=? WHERE Aadhar=?";
//mysqli_query($con,"INSERT INTO data(InstituteName,Institutecode,CourseName,Coursecode,AdmissionNo,Routef,Routeend,Via,Addresss,City,Pincode,Aadhar,Phone) VALUES ('$in','$ic','$cn','$cc','$id','$rf','$re','$v','$a','$ci','$p','$aa','$phone')");
if($stmtt=mysqli_prepare($con,$sql))//"INSERT INTO data(InstituteName,Institutecode,CourseName,Coursecode,AdmissionNo,Routef,Routeend,Via,Addresss,City,Pincode,Aadhar,Phone) VALUES ('$innn','y','y','i','u','5','5','3','12','3','5','123123123123','557452')"))
{
   
    mysqli_stmt_bind_param($stmtt,"sss",$dp,$imagetmp,$aa);
    
    mysqli_stmt_execute($stmtt);
    echo mysqli_affected_rows($con);
    echo "Entered";
}
else{
    echo "error";
}


?>