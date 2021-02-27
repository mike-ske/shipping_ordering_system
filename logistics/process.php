<?php 
session_start();
// ========== LOCAL DATABASE CONNECTION =======
define('DB_HOST', 'l0ebsc9jituxzmts.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
define('DB_PASS', 'j4t9todnysc3k5wc');
define('DB_NAME', 'dkkgb40mcx9x9g95');
define('DB_USER', 'bvgqefhc1r38rru4');




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



function select_table_value($table, $email_set){
    
    global $conn;

    $qry = "SELECT * FROM $table WHERE `email` =  '$email_set' ";
    $result = mysqli_query($conn, $qry) or die('Failed to fetch from database'.mysqli_error($conn));
    return $result;
  }

?>


<?php

// ================ GET SESSION EMAIL FORM FORM DATA =========
$email__id = $_SESSION['email__id'];


$save = isset($_POST['account']);

if ($save) {
    

    $option = mysqli_real_escape_string($conn, $_POST['option']);
    $other = mysqli_real_escape_string($conn, $_POST['other']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quanty']);
    $option_2 = mysqli_real_escape_string($conn, $_POST['option_2']);
    $total = mysqli_real_escape_string($conn, $_POST['total']);

        

// ============= SUBMIT FORM ========
                if (empty($option) || empty($weight) || empty($quantity) || empty($option_2) || empty($total)) {
                    echo "<script>alert('Check Empty fields')</script>";
                    
                }else{
                    echo "";

                }
                if (!empty($option)  || empty($weight) || !empty($quantity) || !empty($option_2) || !empty($total)) {
                   
                    // ======= INSERT DATA TO DATABASE =========
                   
                // Write a query statement 
                $data_result = select_table_value("user_data", $email__id);

                while ($row = mysqli_fetch_assoc($data_result)) {
                    $_SESSION['user_mail'] = $row['email'];

                    $data_mail = $_SESSION['user_mail'];
                    
                }

                $query = "INSERT INTO logic_air(`item`, `other`, `quantity`, `wieght`, `country`, `price`, `email_id`, `isAir`) VALUES ('$option', '$other', '$quantity', '$weight',  '$option_2', '$total', '$email__id', '1')";
                        
                //query the database
                $result = mysqli_query($conn, $query) or die('Failed to insert to Database! '. mysqli_error($conn));

                echo  "<script>alert('Success! Data Saved')</script>";
                
                // ==== REDIRECT TO LOGIN PAGE =======
                header("Location: ../pay/index.html");
                
                }
                else
                {
                    echo "<script>alert('Failed! Something went wrong')</script>";
                }


}


?>

<!-- -=============== SUBMIT SECOND FORM DATA ================ --
<?php

    $save_1 = isset($_POST['account_1']);

    if ($save_1) {

    $option_3 = mysqli_real_escape_string($conn, $_POST['option_3']);
    $other_1 = mysqli_real_escape_string($conn, $_POST['other_1']);
    $weight_1 = mysqli_real_escape_string($conn, $_POST['weight_1']);
    $quantity_1 = mysqli_real_escape_string($conn, $_POST['quanty_1']);
    $option_4 = mysqli_real_escape_string($conn, $_POST['option_4']);
    $total_1 = mysqli_real_escape_string($conn, $_POST['total_1']);

        

    // ============= SUBMIT FORM ========
                if (empty($option_3) || empty($weight_1) || empty($quantity_1) || empty($option_4) || empty($total_1)) {
                    echo "<script>alert('Check Empty fields')</script>";
                    
                }else{
                    echo "";

                }
                if (!empty($option_3)  || !empty($weight_1) || !empty($quantity_1) || !empty($option_4) || !empty($total_1)) {
                   
                    // ======= INSERT DATA TO DATABASE =========
                 
                // Write a query statement 

                $data_result_2 = select_table_value("user_data", $email__id);
                while ($row = mysqli_fetch_assoc($data_result_2)) {
                    $_SESSION['user_mail_2'] = $row['email'];

                    $data_mail_2 = $_SESSION['user_mail_2'];
                    
                }

                $query_2 = "INSERT INTO logic_sea(`item`, `other`, `quantity`, `weight`, `country`, `price`, `email_id`) VALUES ('$option_3', '$other_1', '$weight_1', '$quantity_1',  '$option_4', '$total_1', '$data_mail_2' )";
                        
                //query the database
                $result = mysqli_query($conn, $query_2) or die('Failed to insert to Database! '. mysqli_error($conn));

                echo  "<script>alert('Success! Data Saved')</script>";
                
                // ==== REDIRECT TO LOGIN PAGE =======
                header("Location: ../pay/index.html");
                
                }
                else
                {
                   echo "<script>alert('Failed! Something went wrong')</script>";
                }


    }


?>
