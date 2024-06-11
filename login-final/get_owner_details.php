<?php
include('connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a table named 'residents' with columns 'residentName', 'mobileNumber', and 'apartmentNumber'
$query = "SELECT residentName, mobileNumber, apartmentNumber FROM residents";
$result = $conn->query($query);

$rows = array();
if ($result->num_rows > 0) {
    // Fetch and store all rows in an array
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
} else {
    $error = 'No owner details found.';
}

// Close the database connection
$conn->close();
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="./search.js"></script>
    <style>
        .navbar {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
        }

        .nav-links {
            display: flex;
            list-style-type: none;
        }

        .nav-links li {
            margin-left: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #fff;
        }
        #searchbar {
    margin: 10px;
    padding: 10px;
    border-radius: 5px;
    width: 50%;
    box-sizing: border-box;
}
    </style>
</head>

<body>
<nav class="navbar">
    <ul class="nav-links">
        <li><a href="http://localhost/login-final/homepage.html">Dashboard</a></li>
        <li><a href="http://localhost/login-final/visitors.php">Visitor Details</a></li>
    </ul>
</nav>
<div class="container">
        <input id="searchbar" 
               onkeyup="search()" 
               type="text" name="search" 
               placeholder="Search visitors..">
    </div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Resident Details</h1>
        </div>
    </div>
    <?php if (isset($error)) { ?>
        <div class="row">
            <div class="col-sm-12">
                <p><?php echo $error; ?></p>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Resident Name</th>
                        <th>Mobile Number</th>
                        <th>Apartment Number</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Display each row as a table row
                    foreach ($rows as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["residentName"] . "</td>";
                        echo "<td>" . $row["mobileNumber"] . "</td>";
                        echo "<td>" . $row["apartmentNumber"] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</div>
</body>
</html>
