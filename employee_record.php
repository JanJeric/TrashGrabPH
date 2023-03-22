<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="weblogo2.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Employee Notification</title>
<style>
*{
    margin: 0; padding: 0;
    box-sizing: border-box;
    outline: none; border: none;
    text-decoration: none;
}
/* NAVIGATION */
nav{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100px;
    padding: 10px 90px;
    box-sizing:border-box;
    background: #3b8132;
    border-bottom:#fff;
    font-family: Arial;    
}
nav .logo{
    padding:22px 0px;
    height:80px;
    float:left;
    font-size:30px;
    font-weight:bold;
    text-transform:uppercase;
    color:#fff;
}
nav ul{
    list-style: none;
    float:right;
    margin:0;
    padding:0;
    display:flex;
}
nav ul li a{
    line-height:80px;
    color:#fff;
    padding:12px 30px;
    text-decoration:none;
    font-size:20px;
    font-weight:bold;
    text-transform:uppercase;
    cursor:pointer;    
}
nav ul li a:hover{
    background:rgba(0,254,0,0.45); 
    border-radius:7px;
}
/* CONTENT */
.content{
    font-family: 'poppins', sans-serif;
    text-align:center;
    padding-top:6%;
}
.content p{
    font-size:50px;
    font-weight:900;
}
/* CREATE_ACCOUNT */
legend{
        text-align: center;
        
    }
    fieldset{
        border: 2px solid black;
        border-radius: 15px;
        background-color:#ff;
        padding-left: 50px;
        height: 250px;
        width: 380px;
        margin-left:38%;
    }

    input[type=submit]{
        background:#cce7c9;
         color:#3b8132;
         text-transform:capitalize;
        border-radius:10px;
        width:250px; 
        height:40px;
    }
    input[type=submit]:hover{
        background:#3b8132;
        color:#fff;
        text-transform:capitalize;
         cursor:pointer;
        width:250px; 
        height:40px;
    }

    table{
    border: 1px solid black;
    width: 100%;
    text-align-last: center;
    font-family: arial;
    font-weight:bold;
    height:450px
  
    }
    tr:nth-child(even){
    background-color: #cce7c9;
    }

</style>

</head>
<body>
<nav>
    <div class="logo">Trash Grab</div>
    <ul>
    <li><a href="admin_page.php">Home</a></li>
    <li><a href="create_notification.php">Create notification</a></li>
    <li><a href="logout.php">logout</a></li>
    </ul>
</nav>
</nav>

<div class="content">
    <p>EMPLOYEE RECORDS</p>
</div>
<form method="POST" action="ilagay.php">
        
        <fieldset>
            <legend>Input Data</legend>
        <h3>Enter  ID:  &nbsp&nbsp&nbsp&nbsp&nbsp<input type="number" name="numId" placeholder="1"></h3>
        <h3>Enter  Name: <input type="text" name="txtName" placeholder="Coke"></h3>
        <h3>Enter Email: &nbsp<input type="number" name="numPrice"placeholder="10" step="any" min="0"></h3>
        <input type="submit" name="btnSubmit" ><br><br>
        </fieldset><br>
    </form> 
        <table>

            <tr>
                <th style="height:50px;">ID </th>
                <th> NAME </th>
                <th> EMAIL </th>
                <th> SETTING </th>
            </tr>
              
            <?php 
            include('connection.php');
            $sql= "SELECT * FROM user_form";
            $query = mysqli_query($conn,$sql);
            
            while($row = mysqli_fetch_array($query))
            {
                $productId = $row['id'];
                $productName = $row['name'];
                $productPrice = $row['email'];
                $productPrice = $row['password'];
                $productPrice = $row['user_type'];
                echo "<tr>";
                    echo "<td>$productId</td>";
                    echo "<td>$productName</td>";
                    echo "<td>$productPrice</td>";
                    echo "<td><a href='ilagay.php? Product_ID=$productId'><button> Delete </button></a>
                              <a href='ipabago.php? Product_ID=$productId'><button> Update </button></a></td>";
                echo "</tr>";
            }

             ?>

        </table>
</body>
</html>
<?php  
    //connection to database
    include("koneksyon.php");
        //insert record
    if(isset($_POST['btnSubmit'])) 
    {
        $id = $_POST['numId'];
        $name = $_POST['txtName'];
        $price = $_POST['numPrice'];

    $sql = "INSERT INTO tbl_products(Product_ID,Product_Name,Product_Price ) VALUES ('$id','$name','$price')";
    $query = mysqli_query($conn, $sql);

    if ($query) 
        {
        echo "<script>alert('Record Saved!');window.location.replace('ilagay.php')</script>";
        }
    }

    //delete record
    else if(isset($_GET['Product_ID'])) 
    {
        $product_id = $_GET['Product_ID'];

        $sql = "DELETE FROM tbl_products WHERE Product_ID = '$product_id' ";
        $query = mysqli_query($conn, $sql);
        if ($query) 
        {
            echo "<script>alert('Record Deleted!');window.location.replace('ilagay.php')</script>";
        }
    }

?> 