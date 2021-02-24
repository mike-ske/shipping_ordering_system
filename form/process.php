
<?php 
session_start();
// ========== LOCAL DATABASE CONNECTION =======
define('DB_HOST', 'localhost');
define('DB_PASS', '');
define('DB_NAME', 'shipping');
define('DB_USER', 'root');



$host = DB_HOST;
$user = DB_USER;
$pass = DB_PASS;
$db = DB_NAME;



$conn = mysqli_connect($host, $user, $pass, $db);

// CHECK FOR CENNECTION
if ($conn) 
{
    echo "";
}
else 
{
    die("Failed to connect to database!" . mysqli_error($conn));
}


?>
<?php

    $save_1 = isset($_POST['account_1']);

    if ($save_1) {
       

    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Number = mysqli_real_escape_string($conn, $_POST['Number']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $option_1 = mysqli_real_escape_string($conn, $_POST['option_1']);
    $Region = mysqli_real_escape_string($conn, $_POST['Region']);
    $City = mysqli_real_escape_string($conn, $_POST['City']);
    $Zip = mysqli_real_escape_string($conn, $_POST['Zip_code']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $_SESSION['email__id'] = $Email;
   
        
    

    // ============= SUBMIT FORM ========
                if (empty($Name) || empty($Number) || empty($Email) || empty($option_1) || empty($Region) || empty($City) || empty($Zip) || empty($message)) {
                    echo "<script>alert('Check Empty fields')</script>";
                    
                }else{
                    echo "";

                }
                if (!empty($Name)  || !empty($Number) || !empty($Email) || !empty($option_1) || !empty($Region) || empty($City) || empty($Zip) || empty($message)) {
                   
                   
                // Write a query statement 
                $query = "INSERT INTO user_data(`name`, `phone`, `email`, `country`, `city`, `state`, `code`, `address`) VALUES ('$Name', '$Number', '$Email', '$option_1',  '$City', '$Region', '$Zip',  '$message')";
                        
                //query the database
                $result = mysqli_query($conn, $query) or die('Failed to insert to Database! '. mysqli_error($conn));

                echo  "<script>alert('Success! Data Saved')</script>";
                
                // ==== REDIRECT TO LOGIN PAGE =======
                header("Location: ../logistics/index.html");
                
                }
                else
                {
                   echo "<script>alert('Failed! Something went wrong')</script>";
                }


    }


?>