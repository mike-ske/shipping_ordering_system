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
if ( $conn) 
{
    echo "";
}
else 
{
    die("Failed to connect to database!" . mysqli_error( $conn ));
}


// ===== DEFINE PHPMAILER FUNCTIONS ==========

define('MAIL_USERNAME', 'thinksoftcreative@gmail.com');
define('MAIL_PASSWORD', 'thinksoft2020');


function select_db($table){
    global $conn;

    $qry = "SELECT * FROM " . $table;
    $result = mysqli_query($conn, $qry) or die('Failed to fetch from database'.mysqli_error($conn));
    return $result;
  }
function select_table_value($table, $email_set){
    global $conn;
   
    $qry = "SELECT * FROM $table WHERE `email_id` = '$email_set' ";
    $result = mysqli_query($conn, $qry) or die('Failed to fetch from database'.mysqli_error($conn));
    return $result;
  }
function select_user_data($table, $email_user){
    global $conn;
   
    $qry = "SELECT * FROM $table WHERE `email` = '$email_user' ";
    $result = mysqli_query($conn, $qry) or die('Failed to fetch from database'.mysqli_error($conn));
    return $result;
  }
?>



<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

// Load Composer's autoloader

require '../vendor/autoload.php';

$email__user = $_SESSION['email__id'];

$save_1 = isset($_POST['account_1']);

if ($save_1) {

   
    
     
    // ========== SELECT BOOLEAN VALUE FORM logic_air and logic_sea TABLES ========
    $qry_results_2 = select_table_value("logic_air", $email__user);                 
    while ($row_3 = mysqli_fetch_assoc($qry_results_2)) { $_SESSION['isAir'] = $row_3['isAir']; }

    
    if ($_SESSION['isAir'] == 1) {

        $order_by = "Air";
        //query the database
        $qry_results = select_user_data("user_data", $email__user); 
        // ========== LOOP THROUGH THE logic_air DATA IN TABLES ==================
        while ($row = mysqli_fetch_assoc($qry_results)) {

            $id  = $row['id'];
            $name  = $row['name'];
            $phone = $row['phone'];
            $country  = $row['country'];
            $city  = $row['city'];
            $state  = $row['state'];
            $code  = $row['code'];
            $address  = $row['address'];
        }
    // ===============  LOOP THROUGH THE logic_air TABLE
        $qry_air = select_table_value("logic_air", $email__user); 
        while ($row = mysqli_fetch_assoc($qry_air)) {
        
            $id  = $row['id'];
            $item  = $row['item'];
            $other = $row['other'];
            $quantity  = $row['quantity'];
            $weight  = $row['wieght'];
            $country  = $row['country'];
            $price  = $row['price'];
        }

        if ($country == 800) 
        {
            $_SESSION['country'] = "UK";
        }
        elseif ($country == 1500) 
        {
            $_SESSION['country'] = "US";
        }
    }
    else 
    {
        die("<script>alert('Failed! Something went wrong')</script>". mysqli_error( $conn ));
    }
        
    // ============= FOR SEA TABLE =========
    
    $qry_sea = select_table_value("logic_sea", $email__user);                 
    while ($row_1 = mysqli_fetch_assoc($qry_sea)) { $_SESSION['isSea'] = $row_1['isSea']; }
    

    if ( $_SESSION['isSea'] == 0) 
    {
        $order_by = "Sea";
        //query the database
        $qry_results = select_user_data("user_data", $email__user); 
        // ========== LOOP THROUGH THE DATA IN TABLES ==================
        while ($row = mysqli_fetch_assoc($qry_results)) {

            $id  = $row['id'];
            $name  = $row['name'];
            $phone = $row['phone'];
            $country  = $row['country'];
            $city  = $row['city'];
            $state  = $row['state'];
            $code  = $row['code'];
            $address  = $row['address'];
        }
    // ===============  LOOP THROUGH THE logic_sea TABLE
        $qry_sea_1 = select_table_value("logic_sea", $email__user); 
        while ($row = mysqli_fetch_assoc($qry_sea_1)) {
        
            $id  = $row['id'];
            $item  = $row['item'];
            $other = $row['other'];
            $quantity  = $row['quantity'];
            $weight  = $row['weight'];
            $country  = $row['country'];
            $price  = $row['price'];
        }

        if ($country == 800) 
        {
            $_SESSION['country'] = "UK";
        }
        elseif ($country == 1500) 
        {
            $_SESSION['country'] = "US";
        }
    }
    else 
    {
        die("<script>alert('Failed! Something went wrong')</script>". mysqli_error( $conn ));
    }
                
                             // Instantiation and passing `true` enables exceptions
                                    $mail = new PHPMailer();

                                    //Server settings
                                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                                    $mail->isSMTP();                                            // Send using SMTP
                                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                    $mail->Username   = "thinksoftcreative@gmail.com";                     // SMTP username
                                    $mail->Password   = "thinksoft2020";                               // SMTP password
                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                                    //Recipients
                                    $mail->setFrom('customshiping@gmail.com', 'International freight shipping service');
                                    $mail->addAddress($email__user, $name);     // Add a recipient
                                    $mail->addAddress($email__user);               // Name is optional
                                    $mail->addCC('thinksoftcreative@gmail.com');
                                    $mail->addBCC('thinksoftcreative@gmail.com');

                                    // Content
                                    $mail->isHTML(true);                                  // Set email format to HTML
                                    $mail->Subject = 'Shipping Invoice By Frieght Shipping';
                                    $mail->Body    = '<b>Reply to Frieght Shipping Payment</b> <br><br>
                                    Dear <b>'.$name.'</b> We have recieved your request to order for 
                                    <strong>Freight Shipping Service</strong> and have successfully made payment on your orders.<br><br>
                                    Please check here for your shipping invoice<br>
                                    <p>
                                    <h3>SHIPPING INVOICE</h3><br><br>
                                    Name-------------------------------'.$name.'<br><br>
                                    Email -----------------------------'.$email__user.'<br><br>
                                    Phone------------------------------'.$phone.'<br><br>
                                    Item-------------------------------'.$item.'<br><br>
                                    Other-------------------------------'.$other.'<br><br>
                                    Order By ---------------------------'.$order_by.'<br><br>
                                    Country ---------------------------'.$_SESSION['country'].'<br><br>
                                    Quantity----------------------------'.$quantity.'<br><br>
                                    Weight------------------------------'.$weight.'<br><br>
                                    Total Price---------------------------<strong>NGN '.$price.'</strong><br><br>
                                    Payment-------------------------------<strong>PAYMENT SUCCESSFUL</strong><br><br>

                                    </p>
                                    <br><br><br><hr><strong>Welcome and thank you for Trusting in us with us</strong>';
                            
                                    $mail->send();

                                    if ($mail->send()) {
                                        echo  "<script>alert('Message has been sent! Check your email for confirmation')</script>";
                                    }else {
                                        echo  "<script>alert('Message could not be sent. Check your internet connection')</script>";
                                    }
                    // ========== END OF PHP MAILER TO SEND EMAILS =================
                      

            
        
}

?>
  