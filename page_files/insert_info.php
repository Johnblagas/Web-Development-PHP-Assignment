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
                echo '<script>alert("Η υποβολή σας ήταν ανεπιτυχής, δεν βρέθηκε βάση δεδομένων")</script>';
             die("<script>window.location = 'logout.php'</script>");
            }

            //Insert
            $sql="INSERT INTO ics20005(email, telephone)
            VALUES ('$email', '$telephone')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Η υποβολή σας ήταν επιτυχής")</script>';
            } else {
                echo '<script>alert("Η υποβολή σας ήταν ανεπιτυχής")</script>';
            } 

            
            $conn->close(); 
        ?>
    </body>
</html>