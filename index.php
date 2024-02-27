<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2>list of client</h2>
        <a href="/myshop/create.php" role="button" class="btn btn-primary">new client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>CREATED AT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// read all row from database table
$sql="SELECT *FROM clients";
$result = $connection->query($sql);

if (!$result){
	die("Invalid query: " . $connection->connection->error);
}

// read data of each row
while($row = $result->fetch_assoc()){
	echo "
	<tr>
	 <td>$row[id]</td>
	 <td>$row[name]</td>
	 <td>$row[email]</td>
	 <td>$row[phone]</td>
	 <td>$row[address]</td>
	 <td>$row[created_at]</td>
	 <td>
		<a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]' >Edit</a>
		<a class='btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]' >Delete</a>
	 </td>
    </tr>
	";
}

?>
            </tbody>
        </table>
    </div>
</body>

</html>