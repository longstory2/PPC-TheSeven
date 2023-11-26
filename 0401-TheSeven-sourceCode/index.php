<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hợp đồng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        header h1{
            margin-left: 120px;
        }
        header img {
            float: right;
            margin-right: 30px;
        }
        footer{
            font-size: 25px;
            float: right;
            margin-right: 30px;
        }
        * body {
            background-color: #9DFF6E;
        }
        .table tr thead{
            background-color: #9DFF6E;
        }
        h1{
            margin-top: 10px;
            color: white;
        }
        .container .table{
            margin-top:10px;
        }
    </style>
</head>
<body>
    <header><h1>Bất Động Sản The Seven</h1>
    <img src="images/5e2eb51c-805a-442b-97d8-3d2da38f0858.jpg" alt="1" style="height: 100px; width: 100px;">
</header>
    <div class="container my-5"> 
        <h2>Danh Sách Hợp Đồng</h2>
        <a href="create.php" class="btn btn-primary">New Contract</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full_Contract_Code</th>
                    <th>Customer_Name</th>
                    <th>Year_Of_Birth</th>
                    <th>SSN</th>
                    <th>Customer_Address</th>
                    <th>Mobile</th>
                    <th>Property_ID</th>
                    <th>Date_Of_Contract</th>
                    <th>Price</th>
                    <th>Deposit</th>
                    <th>Remain</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername="localhost";
                $username="root";
                $password="";
                $database="quanlybds_theserven";
                //create connection
                $connection=new mysqli($servername,$username,$password,$database);
                //check connection
                if ($connection->connect_error){
                    die("loi ket noi".$connection->connect_error);
                }
                // đọc toàn bộ dữ liệu trong database
                $sql="select * from Full_Contract";
                $result = $connection->query($sql);
                if(!$result){
                    die("loi gia tri:".$connection->error);
                }
                while($row=$result->fetch_assoc()){
                    echo "<tr>
                    <td>$row[ID]</td>
                    <td>$row[Full_Contract_Code]</td>
                    <td>$row[Customer_Name]</td>
                    <td>$row[Year_Of_Birth]</td>
                    <td>$row[SSN]</td>
                    <td>$row[Customer_Address]</td>
                    <td>$row[Mobile]</td>
                    <td>$row[Property_ID]</td>
                    <td>$row[Date_Of_Contract]</td>
                    <td>$row[Price]</td>
                    <td>$row[Deposit]</td>
                    <td>$row[Remain]</td>
                    <td>$row[Status]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='delete.php?ID=$row[ID]'>Delete</a>
                    </td>
                </tr>" ;
                }
                ?>
                
            </tbody>
        </table>
    </div>
    <footer><u>@Copyright by The Seven</u></footer>
</body>
</html>