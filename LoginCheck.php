<?php
include 'connection.php';
if($_POST)
{
  $fullname=$_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encryption_iv = '1234567891011121';
        $encryption_key = "a44afb0b6808d662";

        $encryptedpswd = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);

 }
 if(empty($email) && empty($password))
 {
       header('location:http://localhost/chatting/Login.php');

 }
 elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) 
 {
      $sql =("SELECT * FROM tbl_users where email='$email' and password='$encryptedpswd'")  or die("failed to query database".mysqli_error());
        
           
           $result=mysqli_query($conn,$sql);
           
           $row=mysqli_fetch_array($result);

          if($row['email']==$email && $row['password']==$encryptedpswd)
           {
            echo"<script>alert('Log In seccessfully!!!' );</script>";
            session_start();
            $_SESSION['user'] = $email;
            // echo $_SESSION['user'];
             $_SESSION['fullname']=$row['fullname'];
             $_SESSION['id']=$row['id'];
            
            
            
            header('location:http://localhost/chatting/index.php');
            exit();
            

           }
           else
           {
            
            echo "<script> alert('failed to login'); </script>";
            header('location:http://localhost/chatting/Login.php');
            exit();
           }
   
 }
 
           
        else
        {

           $sql2 ="SELECT * FROM tbl_admins where full_name='$email' and password='$encryptedpswd'";
          
            
           $result2=mysqli_query($conn,$sql2);
          
            $row2=mysqli_fetch_array($result2);
            
            $admin  = Array('name' => $row2['full_name'],'password' => $row2['password']);
           
            if($admin['name'] == $email && $admin['password']  == $encryptedpswd)
            {  
              session_start();
              $_SESSION['admin']=$email;
            
              header('location:http://localhost/chatting/dashboardhome.php');
              exit();
              

            }
            else
               {
                echo "<script> alert('failed to login'); </script>";
                header('location:http://localhost/chatting/Login.php');
                echo"error";
                exit();
               }

          }
 
 

   


   
?>