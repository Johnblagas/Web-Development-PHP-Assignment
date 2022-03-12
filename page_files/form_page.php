<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FIT</title>

        <link rel="stylesheet" href="form page.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <header>
            <img src="logo.png" alt="main-logo" title="main-logo" width=250>
            <button id="logoutButton">Logout</button>
        </header>

        <div id="welcome">
            <h1> Καλωσορίσατε στην FIT!</h1>
            <h2>Ο δικός σας πάροχος διαδικτύου.</h2>
            <br>

            <h3>Για να μπείτε στην οικογένεια της <b>Fiber Internet Technology</b>, συμπληρώστε την παρκάτω φόρμα.</h3>
        </div>

        <?php
            $fnameErr = $lnameErr = $phone_numErr = $emailErr = "";
            $fname = $lname = $phone_num = $email = $internet_connection = $telephone_line = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if (empty($_POST["fname"])) {
                    $fnameErr = "Απαιτείται όνομα"; 
                
                } 
                elseif (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                    $fnameErr = "Το όνομα δεν μπορεί να έχει κενά";
                   } 
                else {
                    $fname = test_input($_POST["fname"]);
                }

                if (empty($_POST["lname"])) {
                    $lnameErr = "Απαιτείται επίθετο";
                } 
                elseif (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
                    $lnameErr = "Το επίθετο δεν μπορεί να έχει κενά";
                   } 
                else {
                    $lname = test_input($_POST["lname"]);
                }

                if (empty($_POST["email"])) {
                    $emailErr = "Απαιτείται email";
                } 
                elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Λάθος τύπος email";
                   }
                else {
                    $email = test_input($_POST["email"]);
                }

                if (empty($_POST["phone_num"])) {
                    $phone_numErr = "Απαιτείται τηλεφωνικός αριθμός";
                } 
                elseif(!preg_match("/^[0-9]{10}$/", $_POST["phone_num"])) {
                    $phone_numErr = "Μη έγκυρος αριθμός";
                  }
                else {
                    $phone_num = test_input($_POST["phone_num"]);
                }
                
                if (!check_errors($fnameErr, $lnameErr, $phone_numErr, $emailErr)) {
                    $internet_connection = "";
                } 
                else {
                    $internet_connection = test_input($_POST["internet_connection"]); }

                if(!check_errors($fnameErr, $lnameErr, $phone_numErr, $emailErr)){
                    $telephone_line = "";
                }
                elseif(empty($_POST["telephone_line"])) {
                    $telephone_line = "NO";
                } else {
                    $telephone_line = "YES"; }

                if (check_errors($fnameErr, $lnameErr, $phone_numErr, $emailErr)){
                    include "insert_info.php";
                }
            }

            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }

            function check_errors($fnameErr, $lnameErr, $phone_numErr, $emailErr){
                if($fnameErr == "" && $lnameErr == "" && $phone_numErr == "" && $emailErr == ""){
                    return true;
                }
                else{
                    return false;
                }
            }
        ?>

        <form id="main-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h3><u>Φόρμα Συνδρομής</u></h3>

            <label for="fname">Όνομα:</label>
            <input type="text" name="fname">
            <span class="error"><?php echo $fnameErr;?></span>
            <br>

            <label for="lname">Επίθετο:</label>
            <input type="text" name="lname">
            <span class="error"><?php echo $lnameErr;?></span>
            <br>

            <label for="phone_num">Τηλέφωνο</label>
            <input type="text" name="phone_num">
            <span class="error"><?php echo $phone_numErr;?></span>
            <br>

            <label for="email">E-mail:</label>
            <input type="text" name="email">
            <span class="error"><?php echo $emailErr;?></span>
            <br>


            <label for="internet_connection">Ταχύτητα Internet:</label>
            <ul id="internet-speed-list">
                <li><input type="radio" name="internet_connection" value="24" checked> 24 mbps</li>
                <li><input type="radio" name="internet_connection" value="50"> 50 mbps</li>
                <li><input type="radio" name="internet_connection" value="100"> 100 mbps</li>
                <li><input type="radio" name="internet_connection" value="200"> 200 mbps</li>
            </ul>
            <br>

            <label for="telephone_line">Παροχή Τηλεφωνικής Γραμμής</label> <input type="checkbox" name="telephone_line">
            <br>

            <input type="submit">
            <input type="reset">

            <script src="form page.js"></script>
        </form>
    </body>
</html>