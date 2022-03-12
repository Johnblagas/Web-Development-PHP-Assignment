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

        <link rel="stylesheet" href="admin form page.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <header>
            <img src="logo.png" alt="main-logo" title="main-logo" width=250>
        </header>
        <main>
            <button id="createDBButton">Δημιουργία ΒΔ</button>
            <button id="printInfoButton">Δείξε Στοιχεία</button>
            <button id="searchButton">Αναζήτηση</button>

            <div id="searchbar">
                <form method="post" action="<?php echo htmlspecialchars("searchDB.php");?>">
                    <label for="searchbar">Searchbar</labe>
                    <input type="text" name="searchbar" required>
                    <input type="submit" id="submitButton">
                </form>
            </div>

            <br><br>
            <button id="logoutButton">Logout</button>
        </main>

        <script src="admin form page.js"></script>
    </body>
</html>