<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8"> 

    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
           
            //Database Connection
            $conn = new mysqli($servername, $username, $password);
            
            if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
            }
            echo "Connected successfully<br>";

            //Database Creation
            $sql = "CREATE DATABASE formDB";
            if ($conn->query($sql) === TRUE) {
                echo "Database created successfully<br>";
            } else {
                echo "Error creating database: " . $conn->error;
            }


            $dbname = "formDB";
            $conn = new mysqli($servername, $username, $password, $dbname);

            //Table Creation
            $sql = "CREATE TABLE Customers(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                phone_num VARCHAR(10) NOT NULL,
                email VARCHAR(50),
                internet_connection VARCHAR(3) NOT NULL,
                telephone_line VARCHAR(3) NOT NULL
                )";

                if ($conn->query($sql) === TRUE) {
                 echo "Table Customers created successfully<br>";
                } else {
                 echo "Error creating table: " . $conn->error;
                }
            $conn->close(); 
        ?>
    </body>
</html>