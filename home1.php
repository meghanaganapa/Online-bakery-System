<html>
    <head>
        <body>
            <h1>Bakery Menu
</h1>
<a href="logout.php">Logout</a>
<br>
<a href="ordernow.php">Order</a>
<br>
<form method="post" action="?">
<label>Search(by cholestrol)</label>
            <input type="int" id="sea" name="sea"/>
           
            <button name="submit">Search</button>
</form>
<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Price</td>
        <td>quantity</td>
        <td>Cholestrol(per 100g)</td>
</tr>
<?php

session_start();
$con =mysqli_connect("localhost","root","","bakery");
if($con-> connect_error)
{
   die("Connection failed");
}



else{
    echo "0 results";
}
if(isset($_POST["submit"]))
{
    $sea=$_POST['sea'];
    $sql1="SELECT * FROM menu WHERE cholestrol<= $sea";
    $res=$con->query($sql1);

if($res->num_rows>0)
{
    while($row = $res->fetch_assoc())
    {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["price"]."</td><td>".$row["quantity"]."</td><td>".$row["cholestrol"]."</td></tr>";
    }
    echo "</table>";
}
else{
    echo "0 results";
}
}
else{
    $sql="SELECT * FROM menu" ;
    $res=$con->query($sql);
    
    if($res->num_rows>0)
    {
        while($row = $res->fetch_assoc())
        {
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["price"]."</td><td>".$row["quantity"]."</td><td>".$row["cholestrol"]."</td></tr>";
        }
        echo "</table>";
    }
}
?>
</body>
</head>
</html>