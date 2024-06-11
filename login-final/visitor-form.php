<?php
session_start();
include "connect.php";

if (isset($_POST['submit'])) {
    // Retrieve form data
    $visitorName = $_POST['VisitorName'];
    $mobileNumber = $_POST['MobileNumber'];
    $address = $_POST['Address'];
    $apartmentNumber = $_POST['ApartmentNumber'];
    $whomtoMeet = $_POST['WhomtoMeet'];
    $reasontoMeet = $_POST['ReasontoMeet'];
    $visitDate = $_POST['VisitDate'];
    $visitTime = $_POST['VisitTime'];

    // Insert data into the database
    $query = mysqli_query($conn, "INSERT INTO visitor(VisitorName, MobileNumber, Address, ApartmentNumber, WhomtoMeet, ReasontoMeet, VisitDate, VisitTime) VALUES ('$visitorName', '$mobileNumber', '$address', '$apartmentNumber', '$whomtoMeet', '$reasontoMeet', '$visitDate', '$visitTime')");

    // Check if the query was successful
    if ($query) {
        $msg = "Visitor's details have been added.";
    } else {
        $msg = "Something went wrong. Please try again.";
    }

    // Close database connection
    mysqli_close($conn); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Form</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color:  #45a049;
            overflow-x: hidden;
            padding-top: 20px;
        }
        .sidebar h2 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background-color: #555;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="tel"],
        select,
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        select {
            height: 40px;
        }
        textarea {
            height: 100px;
            resize: none;
        }
        .sub {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        .sub:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="http://localhost/login-final/homepage.html">Dashboard</a>
        <a href="http://localhost/login-final/visitors.php">Visitor Details</a>
    </div>

    <div class="content">
        <div class="container">
            <br><br><br><br><br><br>            <br><br><br><br><br><br><br><br><br><br>

            <h2>Visitor Form</h2>
            <form action="visitor-form.php" method="post">


                <label for="VisitorName">Visitor Name:</label>
                <input type="text" id="VisitorName" name="VisitorName" required>

                <label for="MobileNumber">Mobile Number:</label>
                <input type="tel" id="MobileNumber" name="MobileNumber" required>

                <label for="Address">Address:</label>
                <input type="text" id="Address" name="Address">

                <label for="ApartmentNumber">Apartment Number:</label>
                <input type="text" id="ApartmentNumber" name="ApartmentNumber" required>

                <label for="WhomtoMeet">Whom to Meet:</label>
                <input type="text" id="WhomtoMeet" name="WhomtoMeet">

                <label for="ReasontoMeet">Reason to Meet:</label>
                <input type="text" id="ReasontoMeet" name="ReasontoMeet">

                <br>
                 <label for="VisitDate">Visit Date:</label><br>
                <input type="date" id="VisitDate" name="VisitDate" required>
<br><br>
                <label for="VisitTime">Visit Time:</label><br>
                <input type="time" id="VisitTime" name="VisitTime" required>
           <br><br>
                <button class="sub" name="submit" onclick="sub()">Submit</button>
            </form>
            <script>
                function sub() {
                    alert("Visitor details are successfully added");
                }
            </script>
        </div>
    </div>
</body>
</html>
