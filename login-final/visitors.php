<?php 
    include ('connect.php');

    // Assuming you have a table named 'visitor' with columns 'VisitorName', 'MobileNumber', 'Address', 'ApartmentNumber', 'WhomtoMeet', 'ReasontoMeet', 'VisitDate','VisitTime', and 'Status'
    $query = "SELECT VisitorName, MobileNumber, Address, ApartmentNumber, WhomtoMeet, ReasontoMeet, VisitDate, VisitTime FROM visitor";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch and store all rows in an array
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    } else {
        echo json_encode(array('error' => 'No visitor details found.'));
    }

    // Close the database connection
    mysqli_close($conn);
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        <script src="./search.js"></script>

        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="http://localhost/login-final/homepage.html">Dashboard</a></li>
                <li><a href="http://localhost/login-final/get_owner_details.php">Resident Details</a></li>
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
                    <h1>Visitor Details</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>VisitorName</th>
                                <th>Mobile Number</th>
                                <th>Address</th>
                                <th>ApartmentNumber</th>
                                <th>Whom to Meet</th>
                                <th>Reason to Meet</th>
                                <th>Visit Date</th>
                                <th>Visit Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Display each row as a table row
                                foreach ($rows as $row) {
                                    echo "<tr>";
                                    echo "<td>". $row["VisitorName"]. "</td>";
                                    echo "<td>". $row["MobileNumber"]. "</td>";
                                    echo "<td>". $row["Address"]. "</td>";
                                    echo "<td>". $row["ApartmentNumber"]. "</td>";
                                    echo "<td>". $row["WhomtoMeet"]. "</td>";
                                    echo "<td>". $row["ReasontoMeet"]. "</td>";
                                    echo "<td>". $row["VisitDate"]. "</td>";
                                    echo "<td>". $row["VisitTime"]. "</td>";
                                    echo "</tr>";
                                }
                           ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
