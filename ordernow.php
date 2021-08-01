<html>
    <head>
        <body>

        <h1>Order now</h1>
        <form method="post" action="?">
            <label>Order no</label>
            <input type="int" id="oid" name="oid"/>
            <br>
            <br>
            <label>Item no</label>
            <input type="int" id="iid" name="iid"/>
            <br>
            <br>
            <label>quantity</label>
            <input type="int" id="qua" name="qua"/>
            <br>
            <br>
            <label>Price</label>
            <input type="int" id="pri" name="pri"/>
            <br>
            <br>
            <button name="submit">Submit</button>
</form>
<?php
session_start();
$con =mysqli_connect("localhost","root","","bakery");
if($con-> connect_error)
{
   die("Connection failed");
}
if(isset($_POST["submit"]))
{
$oid=$_POST['oid'];
$iid=$_POST['iid'];
$qua=$_POST['qua'];
$p=$_POST['pri'];

$sql="INSERT INTO menuorder (order_id,id,order_quantity,price) VALUES ($oid,$iid,$qua,$p)";

if($res=$con->query($sql))
{
   echo "Added successfully";
   
}
else{
    echo "error on adding";
}
$sql2="SELECT quantity FROM menu WHERE id=$iid" ;
$res1=$con->query($sql2);

if($res1->num_rows>0)
{
    while($row = $res1->fetch_assoc())
    {   
        $t=$row["quantity"]-$qua;
        echo "<p>".$t."</p>";
    }
    
}
else{
    echo "0 results";
}

$sql1="UPDATE menu SET quantity=$t WHERE id=$iid";
if($res2=$con->query($sql1))
{
      echo "entered ";
}
else{
    echo "error";
}}
?>
<a href="bill.php">See Bill</a>
</body>
</head>
</html>
