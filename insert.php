<?php
    include 'connection.php';
    
    if($_POST)
    {
        $message = $_POST['message'];
        

        $ciphering = "AES-128-CTR"; 
        
        $options = 0; 
        $encryption_iv = '1234567891011121';
        $encryption_key = "a44afb0b6808d662";

        $encryptedmsg = openssl_encrypt($message, $ciphering, $encryption_key, $options, $encryption_iv);
        $sql = "INSERT into tbl_message (message) VALUES ('$encryptedmsg')";
             if(mysqli_query($conn, $sql))
             {
                   echo"data has been successfully inserted!!";         
             } 
            else
            {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              
             
                }
                
            
                socket session in js
                how to create web socket end in php
                how to create web socket end in php
               
             

        }
         
    mysqli_close($conn);
?>
