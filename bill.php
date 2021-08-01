<html>
    <head>
        <body>
            <h1>BILL</h1>
            <form method="post" action="?">
            <label>Order no</label>
            <input type="int" id="oid" name="oid"/>
            <button type="submit">Submit</button>
</form>
<table>
    <tr>
        <td>Id</td>
        <td>Quantitiy</td>
        <td>Price</td>
        <td>Total</td>
</tr>
            <?php
                session_start();
                $con =mysqli_connect("localhost","root","","bakery");
                if($con-> connect_error)
                {
                   die("Connection failed");
                }
                
                $oid=$_POST['oid'];
                
                $sql="SELECT price,order_quantity,id FROM menuorder WHERE order_id=$oid" ;
            
                $res=$con->query($sql);
                $r=0;
                if($res->num_rows>0)
                {
                    while($row = $res->fetch_assoc())
                    {   
                        $t=$row["order_quantity"]*$row["price"];
                        $r=$r+$t;
                        echo "<tr><td>".$row["id"]."</td><td>".$row["order_quantity"]."</td><td>".$row["price"]."</td><td>".$t."</td></tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 results";
                }
                echo "Total Bill: $r";
                
            

            ?>

</body>
</head>
</html>