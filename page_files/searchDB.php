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
             die("Connection failed: " . $conn->connect_error);
            }

            //Search Data
            $searchItem="";
            
            if(!empty($_POST["searchbar"]))
            {
                $searchItem = $_POST["searchbar"];

                $result = mysqli_query($conn, "SELECT * FROM Customers WHERE firstname LIKE '%{$searchItem}%' OR lastname LIKE '%{$searchItem}%' OR
                phone_num LIKE '%{$searchItem}%' OR email LIKE '%{$searchItem}%' OR internet_connection LIKE '%{$searchItem}%' OR telephone_line LIKE '%{$searchItem}%'");

                //Print Info
                if($result->num_rows > 0){

                    while ($row = mysqli_fetch_array($result))
                    {
                        echo " <br> id: " . $row["id"].
                        " - FName: " . $row["firstname"]. 
                        " - LName: " . $row["lastname"]. 
                        " - Phone: " . $row["phone_num"].
                        " - Email: " . $row["email"]. 
                        " - Connection Speed: " .$row["internet_connection"]. 
                        " - Line: " .$row["telephone_line"]. "<br>";
                    }
                }
                else {
                        echo "0 results";
                }
            }
            else{
                echo "Invalid search value, please go back.";
            }
            $conn->close();  
        ?>
    </body>
</html>