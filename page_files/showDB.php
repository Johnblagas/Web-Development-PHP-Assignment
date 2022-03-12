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
            $dbname = "formDB";
           
            //Database Connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error . "<br> Please go back and create the database first");
            }


            //Print Info 
            $sql = "SELECT id, firstname, lastname, phone_num, email, internet_connection, telephone_line FROM Customers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            
             while($row = $result->fetch_assoc()) {
             echo " <br> id: " . $row["id"].
              " - FName: " . $row["firstname"]. 
              " - LName: " . $row["lastname"]. 
              " - Phone: " . $row["phone_num"].
              " - Email: " . $row["email"].
              " - Connection Speed: " .$row["internet_connection"]. 
              " - Line: " .$row["telephone_line"]. "<br>";
             }
            } else {
             echo "0 results";
            }
            $conn->close();  
        ?>
    </body>
</html>