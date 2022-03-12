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

            //Database Creation

            $sql = "CREATE DATABASE usersDB";
            if ($conn->query($sql) === TRUE) {

                $dbname = "usersDB";
                $conn->close();
                $conn = new mysqli($servername, $username, $password, $dbname);

                //Table Creation
                $sql = "CREATE TABLE Users(
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(30) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    administrator VARCHAR(3) NOT NULL,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                    )";

                    if ($conn->query($sql) === FALSE) {
                    echo "Error creating table: " . $conn->error;
                    }

                //Admins Add
                $username1 = "ics20000";
                $username2 = "ics20005";
                $password = "123456";
                $admin = "YES";

                
                if($stmt = $conn->prepare("INSERT INTO Users (username, password, administrator) VALUES (?, ?, ?)")){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_admin);
                    
                    // Set parameters
                    $param_username = $username2;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                    $param_admin = $admin;
                    mysqli_stmt_execute($stmt);

                    $param_username = $username1;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                    $param_admin = $admin;
                    mysqli_stmt_execute($stmt);
 
                    mysqli_stmt_close($stmt);
                }
            }
            $conn->close();
            
            

            //Conection to UsersDB
            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', '');
            define('DB_NAME', 'usersDB');
            
            /* Attempt to connect to MySQL database */
            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            
            // Check connection
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
        ?>
    </body>
</html>